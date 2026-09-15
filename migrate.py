import os
import re
import shutil

# Move assets
os.makedirs('public/images', exist_ok=True)
for file in os.listdir('old_files/assets'):
    src = os.path.join('old_files/assets', file)
    dst = os.path.join('public/images', file)
    if os.path.isfile(src):
        shutil.copy2(src, dst)
        if '-' in file:
            dst_under = os.path.join('public/images', file.replace('-', '_'))
            shutil.copy2(src, dst_under)
        
# also copy PDF
if os.path.exists('old_files/assets/$Joseph_ALAYE_CV.pdf'):
    shutil.copy2('old_files/assets/$Joseph_ALAYE_CV.pdf', 'public/CV_Joseph_ALAYE.pdf')

# Process style.css -> resources/css/app.css
with open('old_files/style.css', 'r', encoding='utf-8') as f:
    css = f.read()

# Replace colors
css = css.replace('--black: #000000;', '--black: #0F172A;')
css = css.replace('--bg: #09090b;', '--bg: #0F172A;')
css = css.replace('--bg-soft: #18181b;', '--bg-soft: #1E293B;')
css = css.replace('--accent: #3b82f6;', '--accent: #2563EB;')
css = css.replace('--accent-2: #8b5cf6;', '--accent-2: #06B6D4;')
css = css.replace('--yellow: #facc15;', '--yellow: #FFD700;') # Gold yellow

# Replace fonts
css = css.replace("'Outfit', 'Syne'", "'Poppins', 'Inter'")
css = css.replace("'Outfit', 'Space Grotesk'", "'Inter', 'Space Grotesk'")
css = css.replace("Outfit", "Poppins")
css = css.replace("Syne", "Inter")

with open('resources/css/app.css', 'w', encoding='utf-8') as f:
    f.write(css)

# Process script.js -> resources/js/app.js
with open('old_files/script.js', 'r', encoding='utf-8') as f:
    js = f.read()

with open('resources/js/app.js', 'w', encoding='utf-8') as f:
    f.write(js)

# Process index.html -> resources/views/welcome.blade.php
with open('old_files/index.html', 'r', encoding='utf-8') as f:
    html = f.read()

# Update HTML HEAD for Vite and Laravel
html = html.replace('<link rel="stylesheet" href="style.css" />', "@vite(['resources/css/app.css', 'resources/js/app.js'])")
html = html.replace('<script src="script.js"></script>', '')
# Change fonts URL
html = html.replace("family=Outfit:wght@300;400;500;600;700&family=Syne:wght@500;700;800", "family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700")

# Update images to use asset()
html = re.sub(r'src="\./images/([^"]+)"', r'src="{{ asset(\'images/\1\') }}"', html)
html = re.sub(r'src="images/([^"]+)"', r'src="{{ asset(\'images/\1\') }}"', html)
html = re.sub(r"this\.src='images/([^']+)'", r"this.src='{{ asset(\'images/\1\') }}'", html)
html = re.sub(r"this\.src='laptop_code\.jpg'", r"this.src='{{ asset(\'images/laptop_code.jpg\') }}'", html)

# CV
html = html.replace('href="CV_Joseph_ALAYE.pdf"', 'href="{{ asset(\'CV_Joseph_ALAYE.pdf\') }}"')

with open('resources/views/welcome.blade.php', 'w', encoding='utf-8') as f:
    f.write(html)
print("Migration completed.")
