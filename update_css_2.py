with open('resources/css/app.css', 'r', encoding='utf-8') as f:
    css = f.read()

mouse_trailer_css = """
.mouse-trailer {
    position: fixed;
    top: 0; left: 0;
    width: 20px; height: 20px;
    background: radial-gradient(circle, var(--accent) 0%, transparent 80%);
    border-radius: 50%;
    pointer-events: none;
    z-index: 10000;
    mix-blend-mode: screen;
    opacity: 0.6;
    transition: width 0.2s, height 0.2s;
    filter: blur(4px);
}
"""

if '.mouse-trailer' not in css:
    css += mouse_trailer_css

with open('resources/css/app.css', 'w', encoding='utf-8') as f:
    f.write(css)
