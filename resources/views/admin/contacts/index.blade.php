@extends('layouts.app')

@section('content')
<div class="wrap" style="padding-top: 120px; padding-bottom: 120px; min-height: 100vh;">
    <div class="section-head reveal on">
        <p class="eyebrow">Back-Office</p>
        <h2>Messages de Contact</h2>
    </div>

    <div class="glass" style="padding: 30px; border-radius: 20px;">
        @if($contacts->isEmpty())
            <p style="color: var(--muted);">Aucun message pour le moment.</p>
        @else
            <div style="overflow-x: auto;">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 1px solid var(--line);">
                            <th style="padding: 15px;">Date</th>
                            <th style="padding: 15px;">Nom</th>
                            <th style="padding: 15px;">E-mail</th>
                            <th style="padding: 15px;">Proposition</th>
                            <th style="padding: 15px;">Sujet</th>
                            <th style="padding: 15px;">Projets</th>
                            <th style="padding: 15px;">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <td style="padding: 15px; color: var(--muted); font-size: 0.9rem;">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                            <td style="padding: 15px; font-weight: 600;">{{ $contact->name }}</td>
                            <td style="padding: 15px;"><a href="mailto:{{ $contact->email }}" style="color: var(--accent);">{{ $contact->email }}</a></td>
                            <td style="padding: 15px; color: var(--accent-2);">{{ $contact->proposal }}</td>
                            <td style="padding: 15px;">{{ $contact->subject ?? '-' }}</td>
                            <td style="padding: 15px;">
                                @if(is_array($contact->collab_items) && count($contact->collab_items) > 0)
                                    {{ implode(', ', $contact->collab_items) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td style="padding: 15px; max-width: 300px; color: var(--muted); font-size: 0.9rem;">
                                {{ $contact->message }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
