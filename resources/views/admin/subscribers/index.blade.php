@extends('layouts.app')

@section('content')
<section class="section" style="background:var(--bg);">
  <div class="wrap">
    <a href="{{ route('admin.dashboard') }}" style="display:inline-flex;align-items:center;gap:6px;font-size:.88rem;color:var(--muted);margin-bottom:20px;"><i class="bi bi-arrow-left"></i> Retour</a>
    <div class="section-head reveal">
      <p class="eyebrow" style="color:var(--yellow);">Admin</p>
      <h2>Abonnés ({{ $subscribers->count() }})</h2>
    </div>

    <div class="glass reveal" style="border-radius:16px;overflow:hidden;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>E-mail</th>
            <th>Statut</th>
            <th>Inscrit le</th>
          </tr>
        </thead>
        <tbody>
          @forelse($subscribers as $sub)
            <tr>
              <td style="color:var(--white);">{{ $sub->name ?? '—' }}</td>
              <td>{{ $sub->email }}</td>
              <td>
                @if($sub->active)
                  <span style="color:var(--ok);"><i class="bi bi-check-circle-fill"></i> Actif</span>
                @else
                  <span style="color:var(--muted);"><i class="bi bi-x-circle"></i> Inactif</span>
                @endif
              </td>
              <td style="color:var(--muted);font-size:.85rem;">{{ $sub->created_at->format('d/m/Y') }}</td>
            </tr>
          @empty
            <tr><td colspan="4" style="text-align:center;color:var(--muted);padding:40px;">Aucun abonné.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
