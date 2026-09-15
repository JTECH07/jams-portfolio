with open('resources/views/welcome.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

content = content.replace("\\'", "'")

with open('resources/views/welcome.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)
