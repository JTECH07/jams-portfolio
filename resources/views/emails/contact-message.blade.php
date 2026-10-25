<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
</head>
<body style="margin:0;padding:0;background:#0F172A;font-family:'Inter',Arial,sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#0F172A;padding:40px 20px;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background:#1E293B;border-radius:16px;border:1px solid rgba(255,255,255,.08);">
          <tr>
            <td style="padding:32px;">
              <h2 style="margin:0 0 20px;color:#FFD700;font-size:20px;">Nouveau message de contact</h2>

              <p style="margin:0 0 8px;color:#94A3B8;font-size:14px;"><strong style="color:#F1F5F9;">Nom :</strong> {{ $contact->name }}</p>
              <p style="margin:0 0 8px;color:#94A3B8;font-size:14px;"><strong style="color:#F1F5F9;">E-mail :</strong> {{ $contact->email }}</p>
              <p style="margin:0 0 8px;color:#94A3B8;font-size:14px;"><strong style="color:#F1F5F9;">Proposition :</strong> {{ $contact->proposal }}</p>
              <p style="margin:0 0 8px;color:#94A3B8;font-size:14px;"><strong style="color:#F1F5F9;">Sujet :</strong> {{ $contact->subject ?: '—' }}</p>

              @if(!empty($contact->collab_items))
                <p style="margin:0 0 8px;color:#94A3B8;font-size:14px;"><strong style="color:#F1F5F9;">Éléments :</strong> {{ implode(', ', $contact->collab_items) }}</p>
              @endif

              <div style="margin-top:20px;padding:16px;background:#0F172A;border-radius:10px;color:#E2E8F0;font-size:14px;line-height:1.7;white-space:pre-line;">{{ $contact->message }}</div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
