import React, { useRef } from 'react';
import { motion, useScroll, useTransform } from 'motion/react';

export default function ParallaxImage({ src, alt = '', className = '', speed = 0.15, style = {} }) {
  const ref = useRef(null);
  const { scrollYProgress } = useScroll({ target: ref, offset: ['start end', 'end start'] });
  const y = useTransform(scrollYProgress, [0, 1], [speed * -100, speed * 100]);

  return (
    <div ref={ref} className={`parallax-img-wrap ${className}`} style={{ overflow: 'hidden', ...style }}>
      <motion.img
        src={src}
        alt={alt}
        style={{ y, width: '100%', height: '100%', objectFit: 'cover', display: 'block' }}
        loading="lazy"
      />
    </div>
  );
}
