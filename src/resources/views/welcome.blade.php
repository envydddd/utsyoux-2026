<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $profile->site_title ?? config('app.name') }}</title>
<link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;500;600;700&family=Satoshi:wght@300;400;500;700&display=swap" rel="stylesheet">
<!-- fallback -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
:root {
  --bg:        #0a0a0f;
  --bg2:       #111118;
  --bg3:       #161620;
  --card:      #14141c;
  --border:    rgba(255,255,255,0.07);
  --border2:   rgba(255,255,255,0.12);
  --text:      #f0f0f8;
  --muted:     #8888aa;
  --accent:    #7effd4;   /* teal/mint like screenshots */
  --accent2:   #ff4d8d;   /* pink CTA */
  --accent3:   #a78bfa;   /* purple for skills */
  --white:     #ffffff;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { scroll-behavior: smooth; }

body {
  font-family: 'Plus Jakarta Sans', sans-serif;
  background: var(--bg);
  color: var(--text);
  overflow-x: hidden;
  cursor: none;
}

/* ─── CUSTOM CURSOR ─── */
#cursor {
  width: 12px; height: 12px;
  background: var(--accent);
  border-radius: 50%;
  position: fixed; pointer-events: none; z-index: 9999;
  transform: translate(-50%,-50%);
  transition: transform 0.1s, width 0.25s, height 0.25s, background 0.25s;
  mix-blend-mode: difference;
}
#cursor-ring {
  width: 36px; height: 36px;
  border: 1px solid rgba(126,255,212,0.4);
  border-radius: 50%;
  position: fixed; pointer-events: none; z-index: 9998;
  transform: translate(-50%,-50%);
  transition: all 0.15s ease;
}

/* ─── NOISE ─── */
body::after {
  content: '';
  position: fixed; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
  pointer-events: none; z-index: 100;
}

/* ─── NAVBAR ─── */
nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 50;
  display: flex; align-items: center; justify-content: space-between;
  padding: 1.25rem 4rem;
  background: rgba(10,10,15,0.8);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid var(--border);
}

.nav-logo {
  font-family: 'Space Mono', monospace;
  font-size: 1.1rem; font-weight: 700;
  color: var(--white);
  letter-spacing: -0.02em;
}
.nav-logo span { color: var(--accent); }

.nav-links {
  display: flex; gap: 2.5rem; list-style: none;
}
.nav-links a {
  color: var(--muted); font-size: 0.88rem; font-weight: 500;
  text-decoration: none; transition: color 0.2s;
  position: relative;
}
.nav-links a.active { color: var(--white); }
.nav-links a.active::after {
  content: ''; position: absolute; bottom: -4px; left: 50%; transform: translateX(-50%);
  width: 4px; height: 4px; background: var(--accent); border-radius: 50%;
}
.nav-links a:hover { color: var(--white); }

.nav-right {
  display: flex; align-items: center; gap: 1rem;
}
.nav-lang {
  display: flex; align-items: center; gap: 0.4rem;
  color: var(--muted); font-size: 0.82rem; font-weight: 600;
  border: 1px solid var(--border2);
  border-radius: 100px; padding: 0.3rem 0.85rem;
  cursor: pointer;
}
.nav-lang:hover { color: var(--white); }

/* ─── SECTIONS ─── */
section { min-height: 100vh; padding: 7rem 4rem 5rem; }

/* ─── HERO ─── */
#beranda {
  display: flex; align-items: center;
  justify-content: space-between; gap: 4rem;
  position: relative; overflow: hidden;
}

/* Ambient glow */
#beranda::before {
  content: '';
  position: absolute; top: -200px; left: -200px;
  width: 700px; height: 700px;
  background: radial-gradient(circle, rgba(126,255,212,0.04) 0%, transparent 70%);
  pointer-events: none;
}
#beranda::after {
  content: '';
  position: absolute; bottom: -200px; right: 0;
  width: 500px; height: 500px;
  background: radial-gradient(circle, rgba(167,139,250,0.05) 0%, transparent 70%);
  pointer-events: none;
}

.hero-left { flex: 1; animation: fadeUp 0.9s ease both; }

.hero-eyebrow {
  font-family: 'Space Mono', monospace;
  font-size: 0.75rem; letter-spacing: 0.2em;
  color: var(--muted); text-transform: uppercase;
  margin-bottom: 1.25rem;
}

.hero-name {
  font-family: 'Plus Jakarta Sans', sans-serif;
  font-size: clamp(2.8rem, 5vw, 4.2rem);
  font-weight: 800; line-height: 1.05;
  color: var(--white);
  letter-spacing: -0.03em;
}

.hero-role {
  margin-top: 1rem;
  font-size: 1rem; color: var(--muted);
  font-weight: 400;
}
.hero-role strong {
  display: block;
  font-size: 1.4rem; font-weight: 700;
  color: var(--white);
  text-decoration: underline;
  text-decoration-color: var(--accent);
  text-underline-offset: 5px;
  text-decoration-thickness: 2px;
}

.hero-socials {
  display: flex; gap: 1rem; margin-top: 1.75rem;
}
.hero-socials a {
  width: 38px; height: 38px;
  border: 1px solid var(--border2);
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  color: var(--muted); font-size: 0.95rem;
  text-decoration: none;
  transition: all 0.2s;
}
.hero-socials a:hover {
  border-color: var(--accent); color: var(--accent);
  box-shadow: 0 0 16px rgba(126,255,212,0.15);
}

.hero-desc {
  margin-top: 1.75rem;
  max-width: 480px;
  font-size: 0.92rem; line-height: 1.75;
  color: var(--muted);
}

.hero-cta {
  display: flex; gap: 1rem; margin-top: 2.5rem;
}
.btn-hero-primary {
  display: flex; align-items: center; gap: 0.5rem;
  background: var(--white); color: var(--bg);
  font-weight: 700; font-size: 0.88rem;
  padding: 0.85rem 1.8rem; border-radius: 100px;
  border: none; cursor: pointer; text-decoration: none;
  transition: all 0.25s;
}
.btn-hero-primary:hover {
  background: var(--accent); transform: translateY(-2px);
  box-shadow: 0 12px 28px rgba(126,255,212,0.2);
}
.btn-hero-secondary {
  display: flex; align-items: center; gap: 0.5rem;
  background: transparent; color: var(--white);
  font-weight: 600; font-size: 0.88rem;
  padding: 0.85rem 1.8rem; border-radius: 100px;
  border: 1px solid var(--border2); cursor: pointer;
  text-decoration: none; transition: all 0.25s;
}
.btn-hero-secondary:hover { border-color: var(--white); transform: translateY(-2px); }

/* Hero photo card */
.hero-right { animation: fadeUp 0.9s 0.15s ease both; opacity: 0; }
.hero-photo-card {
  width: 300px;
  border-radius: 24px;
  background: var(--card);
  border: 1px solid var(--border2);
  overflow: hidden;
  position: relative;
  box-shadow: 0 40px 80px rgba(0,0,0,0.5);
}
.hero-photo-img {
  width: 100%; height: 340px;
  background: linear-gradient(160deg, #1a1a2e 0%, #2d2d44 40%, #1a1a2e 100%);
  display: flex; align-items: center; justify-content: center;
  font-size: 6rem;
  position: relative;
}
.hero-photo-inner-text {
  position: absolute; bottom: 16px; left: 16px;
}
.hero-photo-name {
  font-weight: 800; font-size: 1.3rem; color: white;
}
.hero-photo-role {
  font-size: 0.75rem; color: rgba(255,255,255,0.5); margin-top: 2px;
}
.hero-photo-footer {
  padding: 0.85rem 1rem;
  display: flex; align-items: center; justify-content: space-between;
  border-top: 1px solid var(--border);
  background: rgba(255,255,255,0.02);
}
.hero-photo-user {
  display: flex; align-items: center; gap: 0.6rem;
}
.avatar-mini {
  width: 32px; height: 32px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--accent3), var(--accent));
  display: flex; align-items: center; justify-content: center;
  font-size: 0.65rem; font-weight: 700; color: var(--bg);
}
.user-info { font-size: 0.72rem; }
.user-handle { color: var(--white); font-weight: 600; }
.user-status { color: var(--accent); font-size: 0.65rem; display: flex; align-items: center; gap: 4px; }
.status-dot { width: 6px; height: 6px; background: var(--accent); border-radius: 50%; animation: pulse 2s infinite; }
.contact-me-btn {
  font-size: 0.72rem; font-weight: 700;
  color: var(--bg); background: var(--white);
  border-radius: 100px; padding: 0.35rem 0.85rem;
  border: none; cursor: pointer; transition: background 0.2s;
}
.contact-me-btn:hover { background: var(--accent); }

/* ─── TENTANG ─── */
#tentang {
  background: var(--bg);
  display: flex; align-items: center;
  padding: 7rem 4rem;
}
.about-inner {
  max-width: 1100px; margin: 0 auto; width: 100%;
  background: var(--bg3);
  border: 1px solid var(--border);
  border-radius: 28px;
  display: flex; gap: 4rem;
  padding: 3.5rem 3.5rem;
  position: relative; overflow: hidden;
}
.about-inner::before {
  content: '';
  position: absolute; top: -100px; right: -100px;
  width: 400px; height: 400px;
  background: radial-gradient(circle, rgba(167,139,250,0.06) 0%, transparent 70%);
  pointer-events: none;
}

.about-photo {
  width: 220px; flex-shrink: 0;
  height: 280px;
  border-radius: 16px;
  background: linear-gradient(160deg, #1e1e2e, #2a2a40);
  display: flex; align-items: center; justify-content: center;
  font-size: 5rem;
  border: 1px solid var(--border2);
  overflow: hidden;
  position: relative;
}
.about-photo-img {
  width: 100%; height: 100%; object-fit: cover;
}

.about-content { flex: 1; }
.about-title {
  font-size: 2rem; font-weight: 800;
  color: var(--white);
}
.about-title span { color: var(--accent3); }
.about-quote {
  margin-top: 1rem; padding-left: 1rem;
  border-left: 2px solid var(--accent3);
  color: var(--muted); font-style: italic; font-size: 0.9rem;
}
.about-text {
  margin-top: 1.25rem; font-size: 0.9rem;
  line-height: 1.8; color: var(--muted);
}
.about-stats {
  display: flex; gap: 2.5rem; margin-top: 2rem;
}
.astat-num {
  font-size: 2.5rem; font-weight: 800;
  color: var(--accent3); font-family: 'Space Mono', monospace;
  line-height: 1;
}
.astat-label {
  font-size: 0.68rem; letter-spacing: 0.12em;
  text-transform: uppercase; color: var(--muted);
  margin-top: 0.3rem;
}
.btn-cv {
  display: inline-flex; align-items: center; gap: 0.5rem;
  margin-top: 2rem;
  background: var(--bg2); color: var(--white);
  font-weight: 600; font-size: 0.85rem;
  padding: 0.8rem 1.6rem; border-radius: 12px;
  border: 1px solid var(--border2); cursor: pointer;
  text-decoration: none; transition: all 0.2s;
}
.btn-cv:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-2px); }

/* ─── SKILLS ─── */
#skills-section {
  background: var(--bg);
  padding: 7rem 4rem 5rem;
  text-align: center;
}
.section-header { margin-bottom: 3.5rem; }
.section-eyebrow {
  font-family: 'Space Mono', monospace;
  font-size: 0.72rem; letter-spacing: 0.2em;
  text-transform: uppercase; color: var(--accent3);
  margin-bottom: 0.75rem;
}
.section-title-big {
  font-size: clamp(1.8rem, 3vw, 2.5rem);
  font-weight: 800; color: var(--white);
}
.section-title-big span { color: var(--accent); }
.underline-bar {
  width: 48px; height: 3px;
  background: var(--accent3);
  border-radius: 2px; margin: 1rem auto 0;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 1px;
  max-width: 1100px; margin: 0 auto;
  border: 1px solid var(--border);
  border-radius: 20px; overflow: hidden;
}

.skill-card {
  background: var(--card);
  padding: 1.6rem 1rem 1.4rem;
  display: flex; flex-direction: column;
  align-items: center; gap: 0.75rem;
  transition: all 0.25s;
  cursor: default;
  position: relative;
  border: 1px solid transparent;
}
.skill-card:hover {
  background: var(--bg3);
  z-index: 2;
}
.skill-card:hover .skill-icon-wrap {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(0,0,0,0.3);
}
.skill-card:hover .skill-card-border { opacity: 1; }
.skill-card-border {
  position: absolute; inset: 0;
  border-radius: 0;
  border: 1px solid var(--border2);
  opacity: 0; transition: opacity 0.25s;
  pointer-events: none;
}

.skill-icon-wrap {
  width: 52px; height: 52px;
  border-radius: 14px;
  background: var(--bg2);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem;
  transition: all 0.25s;
  border: 1px solid var(--border);
}
.skill-name {
  font-size: 0.8rem; font-weight: 600;
  color: var(--white);
}
.skill-sub {
  font-size: 0.62rem; letter-spacing: 0.08em;
  text-transform: uppercase; color: var(--muted);
  margin-top: -0.4rem;
}

/* ─── PROYEK ─── */
#proyek {
  background: var(--bg); padding: 7rem 4rem 5rem;
  text-align: center;
}
.projects-wrapper {
  max-width: 1100px; margin: 0 auto;
}
.projects-masonry {
  display: grid;
  grid-template-columns: 55% 1fr;
  grid-template-rows: auto auto;
  gap: 1rem;
  margin-top: 3rem;
}
.proj-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 20px; overflow: hidden;
  position: relative; cursor: pointer;
  transition: all 0.35s cubic-bezier(0.2,0.9,0.4,1.1);
}
.proj-card:hover {
  border-color: var(--border2);
  transform: translateY(-6px);
  box-shadow: 0 32px 64px rgba(0,0,0,0.4);
}
.proj-card.large { grid-row: span 2; }

.proj-img {
  width: 100%; height: 220px;
  background: var(--bg3);
  display: flex; align-items: center; justify-content: center;
  font-size: 4rem;
  filter: grayscale(80%);
  transition: filter 0.3s;
  position: relative; overflow: hidden;
}
.proj-card.large .proj-img { height: 380px; font-size: 6rem; }
.proj-card:hover .proj-img { filter: grayscale(0%); }

.proj-img-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(to bottom, transparent 50%, rgba(10,10,15,0.8));
}
.proj-body { padding: 1.25rem 1.4rem 1.4rem; text-align: left; }
.proj-tags {
  display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 0.7rem;
}
.proj-tag {
  font-size: 0.62rem; font-weight: 700;
  letter-spacing: 0.1em; text-transform: uppercase;
  color: var(--accent); background: rgba(126,255,212,0.08);
  border: 1px solid rgba(126,255,212,0.2);
  padding: 0.2rem 0.65rem; border-radius: 100px;
}
.proj-title {
  font-size: 1rem; font-weight: 700; color: var(--white);
  line-height: 1.3;
}
.proj-desc {
  font-size: 0.78rem; color: var(--muted);
  line-height: 1.6; margin-top: 0.4rem;
}
.proj-link {
  display: inline-flex; align-items: center; gap: 0.35rem;
  margin-top: 0.85rem; font-size: 0.78rem; font-weight: 600;
  color: var(--accent); text-decoration: none;
  transition: gap 0.2s;
}
.proj-link:hover { gap: 0.6rem; }

/* ─── KONTAK ─── */
#kontak {
  background: var(--bg); padding: 7rem 4rem 5rem;
}
.contact-wrapper {
  max-width: 1000px; margin: 0 auto;
  text-align: center;
}
.contact-subtitle {
  color: var(--muted); font-size: 0.92rem; margin-top: 0.75rem; margin-bottom: 3rem;
}
.contact-grid {
  display: grid; grid-template-columns: 1fr 1.8fr;
  gap: 1px;
  border: 1px solid var(--border);
  border-radius: 24px; overflow: hidden;
  text-align: left;
}

/* Left panel */
.contact-left {
  background: var(--card);
  padding: 2.25rem 2rem;
  display: flex; flex-direction: column; gap: 1rem;
}
.contact-status {
  display: flex; align-items: center; gap: 0.5rem;
  font-family: 'Space Mono', monospace;
  font-size: 0.68rem; letter-spacing: 0.1em;
  color: var(--accent);
}
.contact-info-card {
  background: var(--bg3);
  border: 1px solid var(--border);
  border-radius: 12px; padding: 1rem 1.1rem;
  display: flex; align-items: center; gap: 0.9rem;
  transition: border-color 0.2s;
  cursor: pointer;
}
.contact-info-card:hover { border-color: var(--border2); }
.cinfo-icon {
  width: 38px; height: 38px;
  border-radius: 10px;
  background: var(--bg2);
  display: flex; align-items: center; justify-content: center;
  font-size: 1rem; color: var(--accent3);
  flex-shrink: 0;
}
.cinfo-label { font-size: 0.62rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--muted); }
.cinfo-value { font-size: 0.82rem; font-weight: 600; color: var(--white); margin-top: 0.15rem; word-break: break-all; }

.contact-socials { margin-top: auto; }
.contact-socials-label { font-size: 0.62rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--muted); margin-bottom: 0.65rem; }
.c-social-row { display: flex; gap: 0.5rem; }
.c-social-btn {
  width: 34px; height: 34px;
  border-radius: 8px;
  border: 1px solid var(--border2);
  background: var(--bg2);
  display: flex; align-items: center; justify-content: center;
  color: var(--muted); font-size: 0.88rem;
  text-decoration: none; transition: all 0.2s;
}
.c-social-btn:hover { border-color: var(--accent); color: var(--accent); }

/* Right panel — form */
.contact-right {
  background: var(--card);
  padding: 2.25rem 2.25rem;
}
.form-title {
  font-family: 'Space Mono', monospace;
  font-size: 0.75rem; letter-spacing: 0.15em;
  text-transform: uppercase; color: var(--white);
  font-weight: 700; margin-bottom: 1.5rem;
  display: flex; align-items: center; gap: 0.6rem;
}
.form-title svg { color: var(--accent2); }

.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem; }
.form-group { display: flex; flex-direction: column; gap: 0.3rem; }
.form-label {
  font-size: 0.68rem; text-transform: uppercase;
  letter-spacing: 0.1em; color: var(--muted);
  display: flex; align-items: center; gap: 0.4rem;
}
.form-label svg { font-size: 0.75rem; }
.form-input, .form-textarea {
  background: var(--bg3);
  border: 1px solid var(--border);
  border-radius: 8px;
  padding: 0.75rem 1rem;
  font-size: 0.85rem; font-family: 'Plus Jakarta Sans', sans-serif;
  color: var(--white); outline: none;
  transition: border-color 0.2s;
  width: 100%;
}
.form-input:focus, .form-textarea:focus { border-color: var(--accent3); }
.form-input::placeholder, .form-textarea::placeholder { color: var(--muted); }
.form-textarea { resize: vertical; min-height: 110px; }

.btn-transmit {
  width: 100%; margin-top: 1rem;
  background: var(--accent2);
  color: white; font-weight: 800;
  font-size: 0.85rem; letter-spacing: 0.08em;
  text-transform: uppercase;
  padding: 1rem; border-radius: 10px;
  border: none; cursor: pointer;
  display: flex; align-items: center; justify-content: center; gap: 0.6rem;
  transition: all 0.25s;
  font-family: 'Space Mono', monospace;
}
.btn-transmit:hover {
  background: #ff2070;
  transform: translateY(-2px);
  box-shadow: 0 16px 40px rgba(255,77,141,0.3);
}

/* ─── FOOTER ─── */
footer {
  border-top: 1px solid var(--border);
  padding: 2rem 4rem;
  display: flex; align-items: center; justify-content: space-between;
  color: var(--muted); font-size: 0.78rem;
}
footer span { color: var(--accent); }

/* ─── SCROLL TO TOP ─── */
#scroll-top {
  position: fixed; bottom: 2rem; right: 2rem;
  width: 44px; height: 44px;
  background: var(--accent);
  border-radius: 12px; border: none;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; z-index: 40;
  box-shadow: 0 8px 24px rgba(126,255,212,0.25);
  opacity: 0; transition: opacity 0.3s, transform 0.3s;
  color: var(--bg); font-size: 1.1rem;
}
#scroll-top.visible { opacity: 1; }
#scroll-top:hover { transform: translateY(-3px); }

/* ─── ANIMATIONS ─── */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(28px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50%       { opacity: 0.5; transform: scale(0.8); }
}
@keyframes blink {
  0%, 100% { opacity: 1; }
  50%       { opacity: 0; }
}

.typewriter::after {
  content: '|'; animation: blink 1s step-end infinite;
  color: var(--accent);
}

.reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.7s ease, transform 0.7s ease; }
.reveal.in { opacity: 1; transform: none; }
.reveal-delay-1 { transition-delay: 0.1s; }
.reveal-delay-2 { transition-delay: 0.2s; }
.reveal-delay-3 { transition-delay: 0.3s; }
</style>
</head>
<body>

<!-- Custom Cursor -->
<div id="cursor"></div>
<div id="cursor-ring"></div>

<!-- ════════════ NAVBAR ════════════ -->
<nav>
  <div class="nav-logo">{{ $profile->nav_brand ?? 'Portfolio' }}<span>.</span></div>
  <ul class="nav-links">
    <li><a href="#beranda" class="active">Beranda</a></li>
    <li><a href="#tentang">Tentang</a></li>
    <li><a href="#proyek">Proyek</a></li>
    <li><a href="#kontak">Kontak</a></li>
  </ul>
  <div class="nav-right"><span style="color:var(--border2)">|</span><div class="nav-lang">{{ $profile->language_label ?? 'ID' }}</div></div>
</nav>

<!-- ════════════ HERO ════════════ -->
<section id="beranda">
  <div class="hero-left">
    <div class="hero-eyebrow">{{ $profile->hero_eyebrow }}</div>
    <h1 class="hero-name">{{ $profile->first_name }}<br>{{ $profile->last_name }}</h1>
    <div class="hero-role">{{ $profile->role_prefix }}<strong class="typewriter">{{ $profile->role_title }}</strong></div>
    <div class="hero-socials">
      @forelse($heroSocials as $social)
        <a href="{{ $social->url ?: '#' }}" title="{{ $social->name }}">{{ $social->icon ?: strtoupper(substr($social->name, 0, 2)) }}</a>
      @empty @endforelse
    </div>
    <p class="hero-desc">{{ $profile->hero_description }}</p>
    <div class="hero-cta">
      <a href="{{ $profile->primary_button_url ?: '#proyek' }}" class="btn-hero-primary">{{ $profile->primary_button_label }}</a>
      <a href="{{ $profile->secondary_button_url ?: '#kontak' }}" class="btn-hero-secondary">{{ $profile->secondary_button_label }}</a>
    </div>
  </div>
  <div class="hero-right"><div class="hero-photo-card"><div class="hero-photo-img">{{ $profile->hero_card_icon }}<div class="hero-photo-inner-text"><div class="hero-photo-name">{{ $profile->hero_card_name }}</div><div class="hero-photo-role">{{ $profile->hero_card_role }}</div></div></div><div class="hero-photo-footer"><div class="hero-photo-user"><div class="avatar-mini">{{ $profile->hero_avatar_initials }}</div><div class="user-info"><div class="user-handle">{{ $profile->hero_handle }}</div><div class="user-status"><span class="status-dot"></span> {{ $profile->hero_status }}</div></div></div><a href="#kontak" class="contact-me-btn" style="text-decoration:none">{{ $profile->hero_contact_label }}</a></div></div></div>
</section>

<!-- ════════════ TENTANG ════════════ -->
<section id="tentang" style="min-height:auto; padding: 5rem 4rem;"><div class="about-inner reveal"><div class="about-photo">{{ $profile->about_photo }}</div><div class="about-content"><h2 class="about-title">{{ $profile->about_title }} <span>{{ $profile->about_title_highlight }}</span></h2><div class="about-quote">{{ $profile->about_quote }}</div><p class="about-text">{{ $profile->about_paragraph_1 }}</p><p class="about-text" style="margin-top:0.75rem">{{ $profile->about_paragraph_2 }}</p><div class="about-stats"><div><div class="astat-num">{{ $profile->stat_1_number }}</div><div class="astat-label">{{ $profile->stat_1_label }}</div></div><div><div class="astat-num">{{ $profile->stat_2_number }}</div><div class="astat-label">{{ $profile->stat_2_label }}</div></div><div><div class="astat-num">{{ $profile->stat_3_number }}</div><div class="astat-label">{{ $profile->stat_3_label }}</div></div></div><a href="{{ $profile->cv_url ?: '#' }}" class="btn-cv">{{ $profile->cv_label }}</a></div></div></section>

<!-- ════════════ SKILLS ════════════ -->
<section id="skills-section"><div class="section-header reveal"><div class="section-eyebrow">{{ $profile->skills_eyebrow }}</div><h2 class="section-title-big">{!! str_replace('&', '<span>&</span>', e($profile->skills_title)) !!}</h2><div class="underline-bar"></div></div><div class="skills-grid reveal reveal-delay-1">@forelse($skills as $skill)<div class="skill-card"><div class="skill-card-border"></div><div class="skill-icon-wrap" style="color:{{ $skill->color ?: '#7effd4' }}"><span style="font-size:1.25rem;font-weight:700">{{ $skill->icon ?: '•' }}</span></div><div class="skill-name">{{ $skill->name }}</div><div class="skill-sub">{{ $skill->subtitle }}</div></div>@empty<p style="color:var(--muted)">Belum ada skill. Tambahkan dari Admin Panel.</p>@endforelse</div></section>

<!-- ════════════ PROYEK ════════════ -->
<section id="proyek">
    <div class="projects-wrapper">
        <div class="section-header reveal" style="text-align:center">
            <h2 class="section-title-big">
                {!! preg_replace('/\s+(\S+)$/', ' <span>$1</span>', e($profile->projects_title)) !!}
            </h2>
            <p style="color:var(--muted);margin-top:.6rem;font-size:.9rem">
                {{ $profile->projects_subtitle }}
            </p>
        </div>

        <div class="projects-masonry">
            @forelse($projects as $project)
                @php
                    $tags = is_array($project->tags)
                        ? $project->tags
                        : array_filter(array_map('trim', explode(',', $project->tags ?? '')));
                @endphp

                <div class="proj-card {{ $project->is_featured ? 'large' : '' }} reveal">
                    <div class="proj-img" style="background:{{ $project->background_gradient ?: 'linear-gradient(135deg,#1a1a2e,#16213e)' }}; {{ $project->is_featured ? '' : 'height:180px;font-size:3rem' }}">
                        @if($project->image)
                            <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->title }}" style="width:100%;height:100%;object-fit:cover;border-radius:inherit">
                        @else
                            {{ $project->icon ?: '🧩' }}
                        @endif

                        <div class="proj-img-overlay"></div>
                    </div>

                    <div class="proj-body">
                        <div class="proj-tags">
                            @foreach($tags as $tag)
                                <span class="proj-tag">{{ $tag }}</span>
                            @endforeach
                        </div>

                        <div class="proj-title">{{ $project->title }}</div>
                        <div class="proj-desc">{{ $project->description }}</div>

                        <a href="{{ $project->url ?: '#' }}" class="proj-link">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            @empty
                <p style="color:var(--muted)">
                    Belum ada proyek. Tambahkan dari Admin Panel.
                </p>
            @endforelse
        </div>
    </div>
</section>
<!-- ════════════ KONTAK ════════════ -->
<section id="kontak">
  <div class="contact-wrapper">
    <div class="reveal">
      <div class="section-eyebrow">{{ $profile->contact_eyebrow }}</div>
      <h2 class="section-title-big">{!! preg_replace('/\s+(\S+)$/', ' <span>$1</span>', e($profile->contact_title)) !!}</h2>
      <p class="contact-subtitle">{{ $profile->contact_subtitle }}</p>
    </div>

    <div class="contact-grid reveal reveal-delay-1">
      <!-- Left -->
      <div class="contact-left">
        <div class="contact-status">
          <span class="status-dot"></span> {{ $profile->system_status }}
        </div>
        <div class="contact-info-card">
          <div class="cinfo-icon">✉️</div>
          <div>
            <div class="cinfo-label">{{ $profile->email_label }}</div>
            <div class="cinfo-value">{{ $profile->email_value }}</div>
          </div>
        </div>
        <div class="contact-info-card">
          <div class="cinfo-icon">💬</div>
          <div>
            <div class="cinfo-label">{{ $profile->whatsapp_label }}</div>
            <div class="cinfo-value">{{ $profile->whatsapp_value }}</div>
          </div>
        </div>
        <div class="contact-socials">
          <div class="contact-socials-label">Temukan di</div>
          <div class="c-social-row">@forelse($contactSocials as $social)<a href="{{ $social->url ?: '#' }}" class="c-social-btn" title="{{ $social->name }}">{{ $social->icon ?: strtoupper(substr($social->name, 0, 2)) }}</a>@empty @endforelse</div>
        </div>
      </div>

      <!-- Right -->
      <div class="contact-right">
        <div class="form-title">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="color:var(--accent2)"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
          {{ $profile->form_title }}
        </div>
        <form id="contact-form">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              ID Pengirim / Nama
            </label>
            <input name="name" class="form-input" type="text" placeholder="Nama lengkap Anda" required>
          </div>
          <div class="form-group">
            <label class="form-label">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 7 10-7"/></svg>
              Frekuensi Email
            </label>
            <input name="email" class="form-input" type="email" placeholder="email@domain.com" required>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Data Transmisi Pesan</label>
          <textarea name="message" class="form-textarea" placeholder="Tulis pesan Anda di sini..." required></textarea>
        </div>
        <button type="submit" class="btn-transmit">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
          INISIASI TRANSMISI ↗
        </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- ════════════ FOOTER ════════════ -->
<footer><span style="color:var(--muted)">{{ $profile->footer_text }}</span><div style="display:flex;gap:1.5rem;color:var(--muted);font-size:0.75rem"><a href="#beranda" style="color:inherit;text-decoration:none;transition:color .2s" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--muted)'">Beranda</a><a href="#tentang" style="color:inherit;text-decoration:none;transition:color .2s" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--muted)'">Tentang</a><a href="#proyek" style="color:inherit;text-decoration:none;transition:color .2s" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--muted)'">Proyek</a><a href="#kontak" style="color:inherit;text-decoration:none;transition:color .2s" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--muted)'">Kontak</a></div></footer>

<!-- Scroll to top -->
<button id="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">↑</button>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // ─── CURSOR ───
  const cursor = document.getElementById('cursor');
  const ring = document.getElementById('cursor-ring');
  let mx = 0, my = 0, rx = 0, ry = 0;
  if (cursor && ring) {
    document.addEventListener('mousemove', e => {
      mx = e.clientX; my = e.clientY;
      cursor.style.left = mx + 'px';
      cursor.style.top = my + 'px';
    });
    function animRing() {
      rx += (mx - rx) * 0.12;
      ry += (my - ry) * 0.12;
      ring.style.left = rx + 'px';
      ring.style.top = ry + 'px';
      requestAnimationFrame(animRing);
    }
    animRing();
    document.querySelectorAll('a,button,.skill-card,.proj-card,.contact-info-card').forEach(el => {
      el.addEventListener('mouseenter', () => {
        cursor.style.width = '20px'; cursor.style.height = '20px';
        ring.style.width = '52px'; ring.style.height = '52px';
      });
      el.addEventListener('mouseleave', () => {
        cursor.style.width = '12px'; cursor.style.height = '12px';
        ring.style.width = '36px'; ring.style.height = '36px';
      });
    });
  }

  // Form AJAX
  const form = document.getElementById('contact-form');
  if (form) {
    form.addEventListener('submit', async function (e) {
      e.preventDefault();
      const data = new FormData(form);
      const payload = {
        name: data.get('name'),
        email: data.get('email'),
        message: data.get('message'),
      };
      const tokenMeta = document.querySelector('meta[name="csrf-token"]');
      const token = tokenMeta ? tokenMeta.getAttribute('content') : '';
      try {
        const res = await fetch('/contact', {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
          },
          body: JSON.stringify(payload),
        });
        if (res.ok) {
          form.reset();
          alert('Terima kasih — pesan Anda telah dikirim.');
        } else {
          const json = await res.json().catch(() => null);
          alert('Gagal mengirim pesan. ' + (json?.message ?? ''));
        }
      } catch (err) {
        alert('Gagal mengirim pesan. Periksa koneksi Anda.');
      }
    });
  }

  // ─── SCROLL REVEAL ───
  const revealEls = document.querySelectorAll('.reveal');
  if (revealEls && revealEls.length) {
    const revealObs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('in'); revealObs.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(el => revealObs.observe(el));
  }

  // ─── SCROLL TO TOP ───
  const scrollBtn = document.getElementById('scroll-top');
  if (scrollBtn) {
    window.addEventListener('scroll', () => {
      scrollBtn.classList.toggle('visible', window.scrollY > 400);
    });
  }

  // ─── ACTIVE NAV ───
  const navLinks = document.querySelectorAll('.nav-links a');
  const sections = document.querySelectorAll('section, #tentang');
  if (sections && sections.length && navLinks && navLinks.length) {
    const updateActiveNav = () => {
      let current = '';
      sections.forEach(s => {
        if (s && typeof s.offsetTop === 'number' && window.scrollY >= s.offsetTop - 200) current = s.id || current;
      });
      navLinks.forEach(a => {
        a.classList.toggle('active', a.getAttribute('href') === '#' + current);
      });
    };
    window.addEventListener('scroll', updateActiveNav);
    updateActiveNav();
  }

  // ─── TYPEWRITER ───
  const roles = ['UI/UX Designer & Web Developer', 'Creative Coder', 'Digital Craftsman'];
  let roleIndex = 0, charIndex = 0, deleting = false;
  const typeEl = document.querySelector('.typewriter');
  if (typeEl) {
    function type() {
      const current = roles[roleIndex];
      if (!deleting) {
        typeEl.textContent = current.substring(0, charIndex + 1);
        charIndex++;
        if (charIndex === current.length) { deleting = true; setTimeout(type, 2000); return; }
      } else {
        typeEl.textContent = current.substring(0, charIndex - 1);
        charIndex--;
        if (charIndex === 0) { deleting = false; roleIndex = (roleIndex + 1) % roles.length; }
      }
      setTimeout(type, deleting ? 40 : 80);
    }
    type();
  }

  // ─── STAT COUNTER ───
  function animateNum(el, target) {
    let n = 0; const step = target / 50;
    const t = setInterval(() => {
      n += step; if (n >= target) { n = target; clearInterval(t); }
      el.textContent = Math.floor(n) + '+';
    }, 35);
  }
  if (typeof IntersectionObserver !== 'undefined') {
    const statObs = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.querySelectorAll('.astat-num').forEach(el => {
            animateNum(el, parseInt(el.textContent));
          });
          statObs.unobserve(e.target);
        }
      });
    }, { threshold: 0.5 });
    const aboutInner = document.querySelector('.about-inner');
    if (aboutInner) statObs.observe(aboutInner);
  }

});
</script>
</body>
</html>
