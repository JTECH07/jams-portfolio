import React, { useRef, useEffect, useState } from 'react';
import { useInView, useMotionValue, useSpring } from 'motion/react';

export default function AnimatedCounter({ target, suffix = '', className = '' }) {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, amount: 0.5 });
  const [display, setDisplay] = useState(0);
  const mv = useMotionValue(0);
  const spring = useSpring(mv, { stiffness: 50, damping: 20 });

  useEffect(() => {
    if (inView) mv.set(target);
  }, [inView, target, mv]);

  useEffect(() => {
    const unsub = spring.on('change', (v) => setDisplay(Math.floor(v)));
    return unsub;
  }, [spring]);

  return (
    <span ref={ref} className={className}>
      {display}{suffix}
    </span>
  );
}
