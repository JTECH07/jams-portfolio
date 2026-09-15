with open('resources/css/app.css', 'r', encoding='utf-8') as f:
    css = f.read()

# Replace variables
css = css.replace('--bg: #09090b;', '--bg: #0F172A;')
css = css.replace('--bg: #0F172A; /* Zinc 950 */', '--bg: #0F172A;')
css = css.replace('--bg-soft: #1E293B; /* Zinc 900 */', '--bg-soft: #1E293B;')
css = css.replace('--black: #0F172A;', '--black: #0F172A;')
css = css.replace('--accent: #2563EB;', '--accent: #2563EB;')
css = css.replace('--accent-2: #06B6D4;', '--accent-2: #06B6D4;')
css = css.replace('--yellow: #FFD700;', '--yellow: #FFD700;')

# Replace hardcoded dark backgrounds
css = css.replace('background: #09090b;', 'background: var(--bg);')
css = css.replace('background: rgba(9, 9, 11, 0.8);', 'background: rgba(15, 23, 42, 0.8);')
css = css.replace('background: rgba(9, 9, 11, 0.98);', 'background: rgba(15, 23, 42, 0.98);')
css = css.replace('background: rgba(9, 9, 11, 0.5);', 'background: rgba(15, 23, 42, 0.5);')
css = css.replace('background: rgba(9, 9, 11, 0.6);', 'background: rgba(15, 23, 42, 0.6);')

# Replace RGB values in hardcoded rgba
# (15, 23, 42) for 0F172A and (30, 41, 59) for 1E293B
css = css.replace('rgba(24, 24, 27,', 'rgba(30, 41, 59,')
css = css.replace('rgba(39, 39, 42,', 'rgba(30, 41, 59,')

# Add futuristic classes
futuristic_classes = """

/* Futuristic animations */
.futuristic-glow {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    position: relative;
    border-radius: 50%;
    background: rgba(6, 182, 212, 0.1);
    box-shadow: 0 0 20px rgba(6, 182, 212, 0.2), inset 0 0 10px rgba(37, 99, 235, 0.2);
    border: 1px solid rgba(6, 182, 212, 0.3);
    animation: pulse-glow 3s infinite alternate;
}

.futuristic-glow i {
    font-size: 2.5rem;
    background: linear-gradient(135deg, var(--accent), var(--accent-2), var(--yellow));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    filter: drop-shadow(0 0 5px rgba(6, 182, 212, 0.5));
}

.hero-icon-container {
    width: 120px;
    height: 120px;
    margin-bottom: 20px;
}
.hero-icon-container i {
    font-size: 4rem;
}

@keyframes pulse-glow {
    0% {
        box-shadow: 0 0 10px rgba(6, 182, 212, 0.2), inset 0 0 5px rgba(37, 99, 235, 0.2);
        transform: scale(1);
    }
    100% {
        box-shadow: 0 0 30px rgba(6, 182, 212, 0.6), inset 0 0 15px rgba(37, 99, 235, 0.6);
        transform: scale(1.05);
    }
}
"""

if '.futuristic-glow' not in css:
    css += futuristic_classes

with open('resources/css/app.css', 'w', encoding='utf-8') as f:
    f.write(css)
