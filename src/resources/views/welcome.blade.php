<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Firaas Ferdinal. | UI/UX Designer & Web Developer</title>
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
  <div class="nav-logo">Firaas</div><span>.</span></div>
  <ul class="nav-links">
    <li><a href="#beranda" class="active">Beranda</a></li>
    <li><a href="#tentang">Tentang</a></li>
    <li><a href="#proyek">Proyek</a></li>
    <li><a href="#kontak">Kontak</a></li>
  </ul>
  <div class="nav-right">
    <span style="color:var(--border2)">|</span>
    <div class="nav-lang">
      <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15 15 0 010 20M12 2a15 15 0 000 20"/></svg>
      ID
    </div>
  </div>
</nav>

<!-- ════════════ HERO ════════════ -->
<section id="beranda">
  <div class="hero-left">
    <div class="hero-eyebrow">HALO, SAYA</div>
    <h1 class="hero-name">Firaas<br>Ferdinal</h1>
    <div class="hero-role">
      Seorang
      <strong class="typewriter">UI/UX Designer &amp; Web Developer</strong>
    </div>
    <div class="hero-socials">
      <a href="#" title="Dribbble"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 6.628 5.374 12 12 12 6.629 0 12-5.372 12-12C24 5.373 18.629 0 12 0zm7.846 5.53a10 10 0 012.028 5.603c-.296-.06-3.26-.662-6.24-.286-.066-.161-.13-.323-.197-.485-.192-.464-.4-.927-.616-1.38 3.304-1.345 4.805-3.28 5.025-3.452zM12 2.055a9.94 9.94 0 016.578 2.465c-.187.154-1.538 1.97-4.738 3.152A50.601 50.601 0 009.52 2.228 9.992 9.992 0 0112 2.055zM7.17 2.918a49.6 49.6 0 014.37 5.385c-3.464 .92-6.52.904-6.852.9A10.016 10.016 0 017.17 2.919zM2.051 12.047v-.26c.322.007 3.966.052 7.675-.85a28.84 28.84 0 01.813 1.569c-.095.027-.19.055-.284.085-3.838 1.24-5.874 4.627-6.047 4.919A9.954 9.954 0 012.051 12.047zm9.949 9.9a9.946 9.946 0 01-6.013-2.017c.138-.28 1.702-3.303 5.924-4.784.017-.006.032-.013.05-.019a34.963 34.963 0 011.853 6.58 9.966 9.966 0 01-1.814.24zm3.762-.793a37.057 37.057 0 00-1.706-6.088c2.76-.44 5.183.282 5.49.376a10.016 10.016 0 01-3.784 5.712z"/></svg></a>
      <a href="#" title="LinkedIn"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
      <a href="#" title="Instagram"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
      <a href="#" title="TikTok"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg></a>
    </div>
    <p class="hero-desc">Saya membantu bisnis dan individu mengubah ide menjadi solusi digital yang indah dan berfungsi.</p>
    <div class="hero-cta">
      <a href="#proyek" class="btn-hero-primary">Lihat Proyek ↗</a>
      <a href="#kontak" class="btn-hero-secondary">Kontak Saya</a>
    </div>
  </div>

  <div class="hero-right">
    <div class="hero-photo-card">
      <div class="hero-photo-img">
        🧑‍💻
        <div class="hero-photo-inner-text">
          <div class="hero-photo-name">Firaas Ferdinal</div>
          <div class="hero-photo-role">Software Engineer</div>
        </div>
      </div>
      <div class="hero-photo-footer">
        <div class="hero-photo-user">
          <div class="avatar-mini">HH</div>
          <div class="user-info">
            <div class="user-handle">@YouxAIBot</div>
            <div class="user-status"><span class="status-dot"></span> Online</div>
          </div>
        </div>
        <button class="contact-me-btn">Contact Me</button>
      </div>
    </div>
  </div>
</section>

<!-- ════════════ TENTANG ════════════ -->
<section id="tentang" style="min-height:auto; padding: 5rem 4rem;">
  <div class="about-inner reveal">
    <div class="about-photo">🏔️</div>
    <div class="about-content">
      <h2 class="about-title">Tentang <span>Saya</span></h2>
      <div class="about-quote">Perpaduan logika kode dan estetika desain.</div>
      <p class="about-text">Perjalanan saya di dunia digital dimulai sejak bangku SMK. Sebagai seorang pelajar otodidak, saya terbiasa memecahkan masalah secara mandiri. Bagi saya, coding adalah seni meriyusun logika yang hidup.</p>
      <p class="about-text" style="margin-top:0.75rem">Saat ini, saya menempuh pendidikan Sastra Inggris di Universitas Widyatama. Kombinasi kemampuan teknis dan komunikasi adalah kekuatan utama saya dalam setiap proyek.</p>
      <div class="about-stats">
        <div>
          <div class="astat-num">3+</div>
          <div class="astat-label">Tahun Pengalaman</div>
        </div>
        <div>
          <div class="astat-num">20+</div>
          <div class="astat-label">Proyek Selesai</div>
        </div>
        <div>
          <div class="astat-num">10+</div>
          <div class="astat-label">Klien Puas</div>
        </div>
      </div>
      <a href="#" class="btn-cv">Unduh CV ↓</a>
    </div>
  </div>
</section>

<!-- ════════════ SKILLS ════════════ -->
<section id="skills-section">
  <div class="section-header reveal">
    <div class="section-eyebrow">Kemampuan Saya</div>
    <h2 class="section-title-big">Creative <span>&</span> Toolstack</h2>
    <div class="underline-bar"></div>
  </div>

  <div class="skills-grid reveal reveal-delay-1">
    <!-- Row 1 -->
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#61dafb">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 13.5a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"/><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/></svg>
      </div>
      <div class="skill-name">React</div>
      <div class="skill-sub">Frontend Lib</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#38bdf8">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.618 15.027 12 18.001 12c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624 1.177 1.194 2.538 2.576 5.512 2.576 3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.337 13.382 8.976 12 6.001 12z"/></svg>
      </div>
      <div class="skill-name">Tailwind</div>
      <div class="skill-sub">CSS Framework</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#f97316">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M3.89 15.672L6.255.461A.341.341 0 016.59 0l4.168.001a.335.335 0 01.168.045.37.37 0 01.135.124l5.51 9.325 3.038-9.321A.346.346 0 0119.942 0h4.046a.349.349 0 01.333.232.361.361 0 01-.028.359L15.27 15.672a.34.34 0 01-.284.154H11.03a.341.341 0 01-.292-.164L5.09 5.964l-1.25 9.76a.345.345 0 01-.337.302H.34a.345.345 0 01-.337-.354H.002z"/></svg>
      </div>
      <div class="skill-name">Firebase</div>
      <div class="skill-sub">Backend Service</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#e2e8f0">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.572 0c-.176 0-.31.001-.358.007a19.76 19.76 0 01-.364.033C7.443.346 4.25 2.185 2.228 5.012a11.875 11.875 0 00-2.119 5.243c-.096.659-.108.854-.108 1.747s.012 1.089.108 1.748c.652 4.506 3.86 8.292 8.209 9.695.779.25 1.6.422 2.534.525.363.04 1.935.04 2.299 0 1.611-.178 2.977-.577 4.323-1.264.207-.106.247-.134.219-.158-.02-.013-.9-1.193-1.955-2.62l-1.919-2.592-2.404-3.558a338.739 338.739 0 00-2.422-3.556c-.009-.002-.018 1.579-.023 3.51-.007 3.38-.01 3.515-.052 3.595a.426.426 0 01-.206.214c-.075.037-.14.044-.495.044H7.81l-.108-.068a.438.438 0 01-.157-.171l-.05-.106.006-4.703.007-4.705.072-.092a.645.645 0 01.174-.143c.096-.047.134-.051.54-.051.478 0 .558.018.682.154.035.038 1.337 1.999 2.895 4.361a10760.433 10760.433 0 004.735 7.17l1.9 2.879.096-.063a12.317 12.317 0 002.466-2.163 11.944 11.944 0 002.824-6.134c.096-.66.108-.854.108-1.748 0-.893-.012-1.088-.108-1.747-.652-4.506-3.859-8.292-8.208-9.695a12.597 12.597 0 00-2.499-.523A33.119 33.119 0 0011.573 0zm4.069 7.217c.347 0 .408.005.486.047a.473.473 0 01.237.277c.018.06.023 1.365.018 4.304l-.006 4.218-.744-1.14-.746-1.14v-3.066c0-1.982.01-3.097.023-3.15a.478.478 0 01.233-.296c.096-.05.13-.054.5-.054z"/></svg>
      </div>
      <div class="skill-name">Next.js</div>
      <div class="skill-sub">Web Framework</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#007acc">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M23.15 2.587L18.21.21a1.494 1.494 0 00-1.705.29l-9.46 8.63-4.12-3.128a.999.999 0 00-1.276.057L.327 7.261A1 1 0 00.326 8.74L3.899 12 .326 15.26a1 1 0 00.001 1.479L1.65 17.94a.999.999 0 001.276.057l4.12-3.128 9.46 8.63a1.492 1.492 0 001.704.29l4.942-2.377A1.5 1.5 0 0024 20.06V3.939a1.5 1.5 0 00-.85-1.352zm-5.146 14.861L10.826 12l7.178-5.448v10.896z"/></svg>
      </div>
      <div class="skill-name">VS Code</div>
      <div class="skill-sub">Code Editor</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#f0f6fc">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
      </div>
      <div class="skill-name">Git/Github</div>
      <div class="skill-sub">Version Control</div>
    </div>

    <!-- Row 2 -->
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#a259ff">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M15.852 8.981h-4.588V0h4.588c2.476 0 4.49 2.014 4.49 4.49s-2.014 4.491-4.49 4.491zM12.735 7.51h3.117c1.665 0 3.019-1.355 3.019-3.019 0-1.665-1.354-3.019-3.019-3.019h-3.117V7.51zm0 1.471H8.148c-2.476 0-4.49-2.014-4.49-4.49S5.672 0 8.148 0h4.588v8.981zm-4.587-7.51c-1.665 0-3.019 1.355-3.019 3.019 0 1.665 1.354 3.019 3.019 3.019h3.117V1.471H8.148zm4.587 15.019H8.148c-2.476 0-4.49-2.014-4.49-4.49s2.014-4.49 4.49-4.49h4.588v8.98zM8.148 8.981c-1.665 0-3.019 1.355-3.019 3.019 0 1.665 1.354 3.019 3.019 3.019h3.117V8.981H8.148zM8.172 24c-2.489 0-4.515-2.014-4.515-4.49s2.014-4.49 4.49-4.49h4.588v4.441c0 2.503-2.047 4.539-4.563 4.539zm-.024-7.51a3.023 3.023 0 00-3.019 3.019c0 1.665 1.365 3.019 3.044 3.019 1.705 0 3.093-1.392 3.093-3.095v-2.943H8.148zm7.704 0h-.098c-2.476 0-4.49-2.014-4.49-4.49s2.014-4.49 4.49-4.49c2.476 0 4.49 2.014 4.49 4.49s-2.014 4.49-4.39 4.49zm-.099-7.509c-1.665 0-3.019 1.355-3.019 3.019 0 1.665 1.354 3.019 3.019 3.019 1.665 0 3.019-1.354 3.019-3.019 0-1.665-1.354-3.019-3.019-3.019z"/></svg>
      </div>
      <div class="skill-name">Figma</div>
      <div class="skill-sub">UI/UX Design</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#31abec">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M0 7.554c0-.189.065-.36.182-.49.118-.13.28-.198.46-.198h4.498l1.038-3.682a.624.624 0 01.122-.222c.059-.07.13-.125.212-.163a.654.654 0 01.266-.056c.09 0 .18.018.261.054.082.036.153.089.213.157a.622.622 0 01.13.226l1.038 3.686h1.66l1.038-3.686a.621.621 0 01.122-.222.617.617 0 01.424-.22.654.654 0 01.266.056.617.617 0 01.342.383l1.038 3.686h1.66l1.038-3.686a.621.621 0 01.122-.222.617.617 0 01.424-.22.654.654 0 01.266.056.617.617 0 01.342.383l1.038 3.686h4.496c.18 0 .342.068.46.197A.666.666 0 0124 7.554v8.282c0 .189-.065.36-.183.489a.634.634 0 01-.46.198H.643a.634.634 0 01-.46-.198A.665.665 0 010 15.836V7.554z"/></svg>
      </div>
      <div class="skill-name">Photoshop</div>
      <div class="skill-sub">Image Editing</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#7dd3fc">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.996 0C5.372 0 0 5.372 0 11.996 0 18.62 5.372 24 11.996 24 18.62 24 24 18.62 24 11.996 24 5.372 18.628 0 11.996 0zM7.2 17.527a.8.8 0 110-1.6.8.8 0 010 1.6zm1.536-4.354c-.384-.192-.672-.576-.672-1.056 0-1.056.864-1.92 1.92-1.92.192 0 .384.032.576.096C9.984 9.408 9.024 8.16 7.68 7.2c1.536.192 3.168.96 4.32 2.208.48.48.864 1.056 1.152 1.68.192-.032.384-.064.576-.064 1.344 0 2.496.864 2.88 2.08a3.832 3.832 0 01-1.056-.16c.032.192.032.384.032.576 0 2.112-1.696 3.808-3.808 3.808-.48 0-.96-.096-1.376-.256a4.032 4.032 0 01-.192.224c-.512.48-1.216.8-1.952.832-.032 0-.064 0-.096.008-.576 0-1.152-.192-1.6-.544.64-.32 1.12-.864 1.344-1.536a3.808 3.808 0 01-.704-1.504z"/></svg>
      </div>
      <div class="skill-name">Lightroom</div>
      <div class="skill-sub">Color Grading</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#ff9a00">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11 0C4.925 0 0 4.925 0 11s4.925 11 11 11 11-4.925 11-11S17.075 0 11 0zm.5 17.5h-1v-7h1v7zm0-9h-1v-1h1v1z"/></svg>
      </div>
      <div class="skill-name">Illustrator</div>
      <div class="skill-sub">Vector Art</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#00c4cc">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M8.571 0C3.838 0 0 3.838 0 8.571c0 4.734 3.838 8.572 8.571 8.572h8.572V8.57C17.143 3.838 13.305 0 8.571 0zm0 13.714c-2.84 0-5.143-2.302-5.143-5.143S5.732 3.43 8.571 3.43s5.143 2.302 5.143 5.143-2.302 5.143-5.143 5.143zM17.143 0c-4.734 0-8.572 3.838-8.572 8.571h8.572c4.733 0 8.571-3.838 8.571-8.571C25.714 3.838 21.876 0 17.143 0z"/></svg>
      </div>
      <div class="skill-name">Canva</div>
      <div class="skill-sub">Layout Design</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#9999ff">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M2.986 0A2.986 2.986 0 000 2.986v18.028A2.986 2.986 0 002.986 24h18.028A2.986 2.986 0 0024 21.014V2.986A2.986 2.986 0 0021.014 0H2.986zm5.997 5.143l7.197 6.86-7.197 6.857V5.143z"/></svg>
      </div>
      <div class="skill-name">Premiere Pro</div>
      <div class="skill-sub">Video Editing</div>
    </div>

    <!-- Row 3 -->
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#c084fc">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M9.15 5.672L6.786.461A.341.341 0 006.45 0l-4.168.001A.335.335 0 002.114.046a.37.37 0 00-.135.124L-.307 8.554l-.038.066a.34.34 0 00.284.514L3.857 9.1l1.338 3.218L.74 21.854a.348.348 0 00.3.484l4.02.003a.35.35 0 00.323-.219l8.68-15.893-.13-.193L9.15 5.672z"/></svg>
      </div>
      <div class="skill-name">After Effects</div>
      <div class="skill-sub">Motion VFX</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#ff6b35">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
      </div>
      <div class="skill-name">CapCut</div>
      <div class="skill-sub">Mobile Editing</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#fbbf24">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M22.748 8.33C22.095 4.726 19.257 1.951 15.63 1.36c-.534-.09-.88.539-.548.956l1.738 2.2a.6.6 0 01-.036.8L15.1 7.004a.6.6 0 01-.868-.032l-2.13-2.37a.6.6 0 00-.896.005L9.077 7.0a.6.6 0 01-.868.032L6.523 5.32a.6.6 0 01-.031-.8l1.738-2.2c.332-.42-.014-1.046-.549-.956C4.054 1.95 1.216 4.726.563 8.33c-.1.548.311 1.058.867 1.058H5.7a.6.6 0 01.507.279l1.218 1.896a.6.6 0 01-.01.65L5.77 14.07a.6.6 0 01-.856.124l-1.99-1.526a.6.6 0 00-.937.426c-.265 2.82.953 5.666 3.418 7.415A8.958 8.958 0 0011.26 22h1.48c1.966 0 3.866-.637 5.355-1.491 2.465-1.749 3.683-4.595 3.418-7.415a.6.6 0 00-.937-.426l-1.99 1.526a.6.6 0 01-.856-.124l-1.645-2.857a.6.6 0 01-.01-.65l1.218-1.896A.6.6 0 0118.3 9.39h5.17c.556 0 .967-.51.867-1.059l.411.001z"/></svg>
      </div>
      <div class="skill-name">DaVinci</div>
      <div class="skill-sub">Colorist</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#f87171">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M11.678 0a.59.59 0 00-.4.147L.146 9.83a.59.59 0 00.4 1.035h2.767v12.545A.59.59 0 003.9 24h16.199a.59.59 0 00.587-.59V10.865h2.767a.59.59 0 00.4-1.035L12.08.147A.59.59 0 0011.679 0z"/></svg>
      </div>
      <div class="skill-name">Audition</div>
      <div class="skill-sub">Audio Mixing</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#a3e635">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M13.25.96L.37 7.63C-.12 7.89-.12 8.63.37 8.9l4.04 2.08-4.04 2.09c-.49.27-.49 1.01 0 1.28l4.04 2.08-4.04 2.09c-.49.27-.49 1.01 0 1.28l12.88 6.67c.31.16.68.16.99 0L23.63 20c.49-.27.49-1.01 0-1.28l-4.04-2.09 4.04-2.08c.49-.27.49-1.01 0-1.28l-4.04-2.09 4.04-2.08c.49-.27.49-1.01 0-1.28L14.24.96c-.31-.16-.68-.16-.99 0z"/></svg>
      </div>
      <div class="skill-name">OBS Studio</div>
      <div class="skill-sub">Streaming</div>
    </div>
    <div class="skill-card">
      <div class="skill-card-border"></div>
      <div class="skill-icon-wrap" style="color:#818cf8">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm-.5 16.5v-9l7 4.5-7 4.5z"/></svg>
      </div>
      <div class="skill-name">Sketch</div>
      <div class="skill-sub">Prototyping</div>
    </div>
  </div>
</section>

<!-- ════════════ PROYEK ════════════ -->
<section id="proyek">
  <div class="projects-wrapper">
    <div class="section-header reveal" style="text-align:center">
      <h2 class="section-title-big">Proyek <span>Terpilih</span></h2>
      <p style="color:var(--muted);margin-top:.6rem;font-size:.9rem">Beberapa karya yang menyoroti keahlian saya.</p>
    </div>
    <div class="projects-masonry">

      <div class="proj-card large reveal">
        <div class="proj-img" style="background:linear-gradient(135deg,#1a1a2e,#16213e)">
          ☕
          <div class="proj-img-overlay"></div>
        </div>
        <div class="proj-body">
          <div class="proj-tags"><span class="proj-tag">Laravel</span><span class="proj-tag">React</span><span class="proj-tag">MySQL</span></div>
          <div class="proj-title">E-Commerce Fashion App</div>
          <div class="proj-desc">Fullstack fashion app dengan payment gateway Midtrans, admin dashboard, dan optimasi performa tinggi.</div>
          <a href="#" class="proj-link">Lihat Detail →</a>
        </div>
      </div>

      <div class="proj-card reveal reveal-delay-1">
        <div class="proj-img" style="background:linear-gradient(135deg,#0f2027,#203a43);height:180px;font-size:3rem">
          🖥️
          <div class="proj-img-overlay"></div>
        </div>
        <div class="proj-body">
          <div class="proj-tags"><span class="proj-tag">Next.js</span><span class="proj-tag">Tailwind</span></div>
          <div class="proj-title">Portfolio Creative Agency</div>
          <div class="proj-desc">Website agency dengan animasi GSAP dan CMS Filament.</div>
          <a href="#" class="proj-link">Lihat Detail →</a>
        </div>
      </div>

      <div class="proj-card reveal reveal-delay-2">
        <div class="proj-img" style="background:linear-gradient(135deg,#1a1a2e,#2d1b69);height:180px;font-size:3rem">
          📊
          <div class="proj-img-overlay"></div>
        </div>
        <div class="proj-body">
          <div class="proj-tags"><span class="proj-tag">Figma</span><span class="proj-tag">Adobe XD</span></div>
          <div class="proj-title">UI/UX Design System</div>
          <div class="proj-desc">Design system fintech dengan dark mode dan aksesibilitas lengkap.</div>
          <a href="#" class="proj-link">Lihat Detail →</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════ KONTAK ════════════ -->
<section id="kontak">
  <div class="contact-wrapper">
    <div class="reveal">
      <div class="section-eyebrow">Hubungi Saya</div>
      <h2 class="section-title-big">Mari <span>Terhubung</span></h2>
      <p class="contact-subtitle">Saya selalu terbuka untuk proyek baru atau sekadar obrolan. Kirimkan sinyal Anda.</p>
    </div>

    <div class="contact-grid reveal reveal-delay-1">
      <!-- Left -->
      <div class="contact-left">
        <div class="contact-status">
          <span class="status-dot"></span> SYSTEM STATUS: ONLINE
        </div>
        <div class="contact-info-card">
          <div class="cinfo-icon">✉️</div>
          <div>
            <div class="cinfo-label">Email Me</div>
            <div class="cinfo-value">yoiyouka@gmail.com</div>
          </div>
        </div>
        <div class="contact-info-card">
          <div class="cinfo-icon">💬</div>
          <div>
            <div class="cinfo-label">Chat WhatsApp</div>
            <div class="cinfo-value">+62 813 1196 5417</div>
          </div>
        </div>
        <div class="contact-socials">
          <div class="contact-socials-label">Temukan di</div>
          <div class="c-social-row">
            <a href="#" class="c-social-btn" title="GitHub">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
            </a>
            <a href="#" class="c-social-btn" title="LinkedIn">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
            </a>
            <a href="#" class="c-social-btn" title="Instagram">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
            </a>
            <a href="#" class="c-social-btn" title="TikTok">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Right -->
      <div class="contact-right">
        <div class="form-title">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="color:var(--accent2)"><path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
          INITIATE DATA TRANSMISSION
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
<footer>
  <span style="color:var(--muted)">© 2025 <span>Firaas Ferdinal</span>. Dibuat dengan Laravel & ❤️</span>
  <div style="display:flex;gap:1.5rem;color:var(--muted);font-size:0.75rem">
    <a href="#beranda" style="color:inherit;text-decoration:none;transition:color .2s" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--muted)'">Beranda</a>
    <a href="#tentang" style="color:inherit;text-decoration:none;transition:color .2s" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--muted)'">Tentang</a>
    <a href="#proyek" style="color:inherit;text-decoration:none;transition:color .2s" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--muted)'">Proyek</a>
    <a href="#kontak" style="color:inherit;text-decoration:none;transition:color .2s" onmouseover="this.style.color='var(--accent)'" onmouseout="this.style.color='var(--muted)'">Kontak</a>
  </div>
</footer>

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
