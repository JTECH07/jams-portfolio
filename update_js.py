with open('resources/js/app.js', 'r', encoding='utf-8') as f:
    js = f.read()

# Fix form ID
js = js.replace("getElementById('dynamicContactForm')", "getElementById('laravelContactForm')")

# Remove iframe logic
js = js.replace("""
      if (formFrame) {
        formFrame.addEventListener('load', () => {
          if (!isSubmitting) return;
          isSubmitting = false;
          submitBtn.disabled = false;
          suppressResetClear = true;
          contactForm.reset();
          suppressResetClear = false;
          formStatus.className = 'form-status ok';
          formStatus.textContent = 'Message bien envoyé. Je vous réponds rapidement !';
        });
      }""", "")

js = js.replace("""
        isSubmitting = true;
        submitBtn.disabled = true;
        formStatus.className = 'form-status';
        formStatus.textContent = 'Envoi en cours...';""", "")

js = js.replace("""
        mailSubjectHidden.value = `Portfolio | ${effectiveSubject}`;""", "")

js = js.replace("""
      const formFrame = document.getElementById('formSubmitFrame');
      const collabHidden = document.getElementById('collaborationResume');
      const subjectHidden = document.getElementById('sujetEffectif');
      const mailSubjectHidden = contactForm.querySelector('input[name="_subject"]');""", """
      const collabHidden = document.getElementById('collaborationResume');
      const subjectHidden = document.getElementById('sujetEffectif');""")

# Add a futuristic mouse trailer effect
mouse_trailer = """
// Futuristic Mouse Trailer
const trailer = document.createElement('div');
trailer.className = 'mouse-trailer';
document.body.appendChild(trailer);
window.addEventListener('mousemove', e => {
  const x = e.clientX - trailer.offsetWidth / 2, y = e.clientY - trailer.offsetHeight / 2;
  const keyframes = { transform: `translate(${x}px, ${y}px)` };
  trailer.animate(keyframes, { duration: 800, fill: 'forwards' });
});
"""

if "Futuristic Mouse Trailer" not in js:
    js += "\n" + mouse_trailer

with open('resources/js/app.js', 'w', encoding='utf-8') as f:
    f.write(js)
