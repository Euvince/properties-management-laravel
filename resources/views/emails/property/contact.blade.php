<x-mail::message>
# Nouvelle Demande de contact

Une nouvelle demande de contact a été faite pour le Bien <a href="{{ route('show', ['slug' => $property->getSlug(), 'property' => $property->id]) }}">{{ $property->title }}</a>

    -Prénom : {{ $data['firstname'] }}
    -Nom : {{ $data['lastname'] }}
    -Téléphone : {{ $data['phone'] }}
    -Email : {{ $data['email'] }}

**Message : **<br />
{{ $data['message'] }}

Thanks
</x-mail::message>
