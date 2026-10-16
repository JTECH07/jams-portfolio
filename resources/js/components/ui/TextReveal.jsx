import React from 'react';
import { motion } from 'motion/react';

export default function TextReveal({ text, className = '', delay = 0, stagger = 0.04 }) {
  const words = text.split(' ');
  return (
    <motion.span
      className={className}
      initial="hidden"
      whileInView="visible"
      viewport={{ once: true, amount: 0.5 }}
      transition={{ staggerChildren: stagger, delayChildren: delay }}
      aria-label={text}
    >
      {words.map((word, i) => (
        <span key={i} style={{ display: 'inline-block', overflow: 'hidden', verticalAlign: 'bottom' }}>
          <motion.span
            style={{ display: 'inline-block' }}
            variants={{
              hidden: { y: '100%', opacity: 0 },
              visible: { y: 0, opacity: 1, transition: { duration: 0.6, ease: [0.21, 0.47, 0.32, 0.98] } },
            }}
          >
            {word}{i < words.length - 1 ? '\u00A0' : ''}
          </motion.span>
        </span>
      ))}
    </motion.span>
  );
}
