<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body style="margin:0;padding:0;background:#0F172A;font-family:'Inter',sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#0F172A;padding:40px 20px;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background:#1E293B;border-radius:16px;overflow:hidden;border:1px solid rgba(255,255,255,.08);">
          {{-- Header --}}
          <tr>
            <td style="padding:32px;text-align:center;background:linear-gradient(135deg,#1E293B,#0F172A);">
              <h1 style="margin:0;color:#FFD700;font-size:24px;font-weight:800;">JAMS TECH</h1>
              <p style="margin:8px 0 0;color:#94A3B8;font-size:14px;">Nouvel article publié</p>
            </td>
          </tr>

          {{-- Content --}}
          <tr>
            <td style="padding:32px;">
              <h2 style="margin:0 0 12px;color:#F1F5F9;font-size:20px;font-weight:700;">
                {{ $post->title }}
              </h2>
              <p style="margin:0 0 20px;color:#94A3B8;font-size:15px;line-height:1.6;">
                {{ $post->excerpt }}
              </p>
              <a href="{{ url('/blog/' . $post->slug) }}" style="
                display:inline-block;padding:12px 28px;
                background:linear-gradient(135deg,#2563EB,#06B6D4);
                color:#fff;text-decoration:none;border-radius:10px;
                font-weight:600;font-size:14px;
              ">
                Lire l'article →
              </a>
            </td>
          </tr>

          {{-- Footer --}}
          <tr>
            <td style="padding:24px 32px;border-top:1px solid rgba(255,255,255,.06);text-align:center;">
              <p style="margin:0;color:#64748B;font-size:12px;">
                Vous recevez cet email car vous êtes abonné(e) au blog de Joseph ALAYE.<br/>
                <a href="{{ url('/blog') }}" style="color:#94A3B8;">Voir le blog</a>
              </p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
