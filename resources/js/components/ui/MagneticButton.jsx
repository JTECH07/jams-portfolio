import React, { useRef } from 'react';
import { motion, useMotionValue, useSpring } from 'motion/react';

export default function MagneticButton({ children, className = '', strength = 0.3, ...props }) {
  const ref = useRef(null);
  const x = useMotionValue(0);
  const y = useMotionValue(0);
  const sx = useSpring(x, { stiffness: 150, damping: 15, mass: 0.1 });
  const sy = useSpring(y, { stiffness: 150, damping: 15, mass: 0.1 });

  const handleMouse = (e) => {
    const rect = ref.current.getBoundingClientRect();
    const cx = rect.left + rect.width / 2;
    const cy = rect.top + rect.height / 2;
    x.set((e.clientX - cx) * strength);
    y.set((e.clientY - cy) * strength);
  };

  const reset = () => { x.set(0); y.set(0); };

  return (
    <motion.div
      ref={ref}
      style={{ x: sx, y: sy, display: 'inline-block' }}
      onMouseMove={handleMouse}
      onMouseLeave={reset}
      {...props}
    >
      <span className={className}>{children}</span>
    </motion.div>
  );
}
