import React from 'react';
import { motion } from 'motion/react';

export default function GlowCard({ children, className = '', delay = 0 }) {
  return (
    <motion.div
      className={`glow-card ${className}`}
      initial={{ opacity: 0, y: 50, scale: 0.95 }}
      whileInView={{ opacity: 1, y: 0, scale: 1 }}
      viewport={{ once: true, amount: 0.3 }}
      transition={{ duration: 0.7, delay, ease: [0.21, 0.47, 0.32, 0.98] }}
      whileHover={{ y: -8, scale: 1.02, transition: { duration: 0.3 } }}
    >
      {children}
    </motion.div>
  );
}
