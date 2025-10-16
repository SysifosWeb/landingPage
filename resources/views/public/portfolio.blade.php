@extends('public.layout')

@section('title', $seo['title'] ?? config('app.name'))

@section('meta')
    @if(!empty($seo['description']))
        <meta name="description" content="{{ $seo['description'] }}" />
    @endif
    @if(!empty($seo['keywords']))
        <meta name="keywords" content="{{ $seo['keywords'] }}" />
    @endif
    <meta name="robots" content="index, follow" />
    @if(!empty($seo['canonical']))
        <link rel="canonical" href="{{ $seo['canonical'] }}" />
    @endif
    @if(!empty($seo['og_type']))
        <meta property="og:type" content="{{ $seo['og_type'] }}" />
    @endif
    @if(!empty($seo['title']))
        <meta property="og:title" content="{{ $seo['title'] }}" />
        <meta name="twitter:title" content="{{ $seo['title'] }}" />
    @endif
    @if(!empty($seo['description']))
        <meta property="og:description" content="{{ $seo['description'] }}" />
        <meta name="twitter:description" content="{{ $seo['description'] }}" />
    @endif
    @if(!empty($seo['canonical']))
        <meta property="og:url" content="{{ $seo['canonical'] }}" />
    @endif
    @if(!empty($seo['og_image']))
        <meta property="og:image" content="{{ $seo['og_image'] }}" />
        <meta name="twitter:image" content="{{ $seo['og_image'] }}" />
    @endif
    @if(!empty($seo['twitter_card']))
        <meta name="twitter:card" content="{{ $seo['twitter_card'] }}" />
    @endif
@endsection

@php
    $pageComponent = 'Portfolio';
    $pageProps = [
        'seo' => $seo,
    ];
@endphp
