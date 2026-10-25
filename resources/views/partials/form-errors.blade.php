@if($errors->any())
  <div style="padding:12px 18px;border-radius:10px;background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.3);color:#ef4444;margin-bottom:20px;font-size:.88rem;line-height:1.6;">
    <i class="bi bi-exclamation-circle-fill"></i>
    <strong>Corrigez les erreurs suivantes :</strong>
    <ul style="margin:6px 0 0;padding-left:20px;">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
