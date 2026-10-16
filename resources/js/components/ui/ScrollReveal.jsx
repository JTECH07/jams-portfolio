import React from 'react';
import { motion } from 'motion/react';

const variants = {
  hidden: { opacity: 0, y: 60, filter: 'blur(6px)' },
  visible: (i = 0) => ({
    opacity: 1,
    y: 0,
    filter: 'blur(0px)',
    transition: {
      duration: 0.8,
      delay: i * 0.12,
      ease: [0.21, 0.47, 0.32, 0.98],
    },
  }),
};

export default function ScrollReveal({ children, className = '', delay = 0, once = true, amount = 0.3 }) {
  return (
    <motion.div
      className={className}
      custom={delay}
      initial="hidden"
      whileInView="visible"
      viewport={{ once, amount }}
      variants={variants}
    >
      {children}
    </motion.div>
  );
}
