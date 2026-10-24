import React, { useEffect, useRef } from 'react';
import { useReducedMotion } from 'motion/react';
import './DepthRibbon.css';

const SPEED = 6;
const RADIUS = 440;

export default function DepthRibbon({ items = [] }) {
  const reduce = useReducedMotion();
  const stageRef = useRef(null);
  const ringRef = useRef(null);
  const pausedRef = useRef(false);
  const angleRef = useRef(0);

  useEffect(() => {
    if (reduce || !ringRef.current) return;
    let frame;
    let last = null;

    const tick = (time) => {
      if (last === null) last = time;
      const dt = Math.min((time - last) / 1000, 0.05);
      last = time;

      if (!pausedRef.current) {
        angleRef.current = (angleRef.current + dt * SPEED) % 360;
        ringRef.current.style.transform = `rotateY(${angleRef.current}deg)`;
      }

      frame = requestAnimationFrame(tick);
    };

    ringRef.current.style.transform = `rotateY(${angleRef.current}deg)`;
    frame = requestAnimationFrame(tick);
    return () => cancelAnimationFrame(frame);
  }, [reduce]);

  const handlePointerMove = (event) => {
    if (reduce || !stageRef.current) return;
    const rect = event.currentTarget.getBoundingClientRect();
    const nx = (event.clientX - rect.left) / rect.width - 0.5;
    const ny = (event.clientY - rect.top) / rect.height - 0.5;
    stageRef.current.style.transform =
      `rotateX(${-10 + ny * -8}deg) rotateY(${nx * 14}deg)`;
  };

  const resetTilt = () => {
    if (stageRef.current) stageRef.current.style.transform = 'rotateX(-10deg) rotateY(0deg)';
  };

  const cards = items.length ? [...items, ...items] : [];
  const step = cards.length ? 360 / cards.length : 30;

  if (!items.length) {
    return null;
  }

  return (
    <div
      className="depth-ribbon"
      onMouseEnter={() => { pausedRef.current = true; }}
      onMouseLeave={() => { pausedRef.current = false; resetTilt(); }}
      onPointerMove={handlePointerMove}
      role="region"
      aria-label="Ruban de certifications"
    >
      <div className="depth-ribbon-glow" aria-hidden="true" />
      <div className="depth-ribbon-stage" ref={stageRef}>
        <div className="depth-ribbon-ring" ref={ringRef}>
          {cards.map((item, index) => (
            <article
              className="depth-ribbon-card"
              key={`${item.title}-${index}`}
              style={{ transform: `rotateY(${index * step}deg) translateZ(var(--ribbon-radius, ${RADIUS}px))` }}
              aria-hidden={index >= items.length ? 'true' : undefined}
            >
              <figure className="depth-ribbon-media">
                <img src={`/${item.image}`} alt="" loading="lazy" />
                <span className="depth-ribbon-year">{item.year}</span>
              </figure>
              <div className="depth-ribbon-copy">
                <span className="depth-ribbon-issuer">{item.issuer}</span>
                <h4>{item.title}</h4>
                <p className="depth-ribbon-desc">{item.desc}</p>
              </div>
            </article>
          ))}
        </div>
      </div>
      <span className="depth-ribbon-hint">
        <i className="bi bi-arrow-left-right" aria-hidden="true" /> Survolez pour mettre en pause
      </span>
    </div>
  );
}
