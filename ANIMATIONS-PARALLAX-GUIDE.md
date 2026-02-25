# DOST'AUDIT - Animations & Parallax Effects Guide

Complete documentation for all scroll animations, parallax effects, and interactive animations implemented on the website.

---

## 🎬 Animation System Overview

The website features a comprehensive animation system with:
- **Scroll-triggered animations** - Elements animate as they enter viewport
- **Parallax scrolling** - Multi-layer depth effect on scroll
- **Hover interactions** - 3D transforms and smooth transitions
- **Number counting** - Animated statistics counters
- **Mouse tracking** - Parallax effects following cursor movement

---

## 📜 Scroll-Triggered Animations

### Animation Types

#### 1. **Fade In Up** (`slide-up`)
- Elements slide up while fading in
- Used for: Service cards, general content
- Duration: 0.8s
- Easing: ease

```css
@keyframes fadeInUp {
    from: opacity 0, translateY(60px)
    to: opacity 1, translateY(0)
}
```

#### 2. **Fade In Down** (`slide-down`)
- Elements slide down while fading in
- Used for: Section headers
- Duration: 0.8s

#### 3. **Fade In Left** (`slide-left`)
- Elements slide from left while fading in
- Used for: Hero text, About text, Contact info
- Duration: 0.8s

#### 4. **Fade In Right** (`slide-right`)
- Elements slide from right while fading in
- Used for: Hero image, About image, Contact form
- Duration: 0.8s

#### 5. **Scale In** (`scale-in`)
- Elements scale up while fading in
- Used for: Metric cards, CTA section
- Duration: 0.8s

#### 6. **Bounce In** (`bounce-in`)
- Elements bounce in with overshoot effect
- Used for: Stats, testimonials
- Duration: 1s
- Has bounce effect at 60% and 80%

### Stagger Delays

Elements animate sequentially with delays:
- `.animate-delay-1`: 0.1s
- `.animate-delay-2`: 0.2s
- `.animate-delay-3`: 0.3s
- `.animate-delay-4`: 0.4s
- `.animate-delay-5`: 0.5s
- `.animate-delay-6`: 0.6s

**Applied to:**
- Service cards (6 cards, staggered)
- Metric cards (4 cards, staggered)
- Hero stats (3 stats, staggered)

---

## 🌊 Parallax Scrolling Effects

### Image Parallax

#### **Hero Image**
- **Effect**: Moves down as you scroll
- **Speed**: 50px movement range
- **Calculation**: Based on scroll percentage through hero section
- **Trigger**: Active when hero section is in viewport

#### **Team Image**
- **Effect**: Moves up as you scroll (inverse parallax)
- **Speed**: -30px movement range
- **Calculation**: Based on scroll percentage through about section
- **Trigger**: Active when about section is in viewport

### Element Parallax

#### **Floating Elements**
- **Count**: 2 decorative elements in hero
- **Effect**: Move at different speeds creating depth
- **Speed**: 
  - Element 1: 0.5 speed multiplier
  - Element 2: 0.7 speed multiplier

#### **Decorative Blobs**
- **Effect**: Subtle movement creating atmospheric depth
- **Speed**: 0.3-0.45 speed multiplier
- **Transform**: Combined translation and scaling

### Background Parallax

#### **Hero Background Animation**
- **Effect**: Slow-moving radial gradients
- **Duration**: 20 seconds
- **Movement**: -5% translation in both axes
- **Loop**: Infinite

```css
@keyframes heroParallax {
    0%, 100%: translate(0, 0)
    50%: translate(-5%, -5%)
}
```

---

## 🖱️ Mouse Interaction Effects

### 3D Card Tilt (Mouse Parallax)

**Applied to:**
- Service cards
- Metric cards

**Effect:**
- Cards tilt based on mouse position
- Creates 3D perspective effect
- Smooth return to neutral on mouse leave

**Technical Details:**
```javascript
perspective: 1000px
rotateX: ±(y-offset) / 20
rotateY: ±(x-offset) / 20
```

**Behavior:**
- Mouse in center: No rotation
- Mouse at edges: Maximum ±rotation
- Mouse leave: Smooth reset to 0deg

---

## 🎯 Hover Animations

### Service Cards

**Default Hover:**
- Transform: `translateY(-12px) scale(1.02)`
- Background tint: Blue overlay
- Shadow: Increased depth and blur
- Duration: 0.4s cubic-bezier

**Icon Animation:**
- Scale: 1.1
- Rotation: 5deg
- Timing: Synced with card hover

**Blob Animation:**
- Scale: 1.2
- Opacity: 0.8
- Creates expansion effect

### Images (Hero & Team)

**Hover Effect:**
- Transform: `translateY(-10px) scale(1.02)`
- Shadow: Increases to 60px blur
- Intensity: 0.3 opacity
- Duration: 0.5s ease-out

**Visual Result:**
- Images lift off page
- Enhanced depth perception
- Smooth transition

### Buttons (Primary & Secondary)

#### **Primary Button:**
- Ripple effect from center
- Background color shift
- Scale: 1.05
- Lift: -3px
- Shadow: Blue-tinted glow

#### **Secondary Button:**
- Fill effect from left to right
- Border remains visible
- Same lift and scale as primary
- Smooth color transition

**Active State:**
- Scale: 1.02
- Lift: -1px
- Quick spring-back feel

---

## 🔢 Number Counting Animation

### How It Works

**Triggered by:** Intersection Observer when element enters viewport

**Elements Affected:**
- `.stat-number` (Hero section)
- `.metric-number` (About section)

**Animation Details:**
- Duration: 2 seconds
- Start: 0
- End: Target number
- Frame rate: ~60fps (16ms interval)
- Delay: 300ms after element visible

**Suffix Preservation:**
- `+` symbol added after counting
- `%` symbol added after counting
- Maintains original formatting

**Example:**
```javascript
10+ → counts 0 to 10, then adds +
98% → counts 0 to 98, then adds %
```

---

## 🌀 Loading & Page Transitions

### Page Load Animation

**Effect:**
- Body fades from 0 to 1 opacity
- Duration: 0.5s
- Delay: 100ms
- Creates smooth entrance

### Smooth Scrolling

**Enabled for:**
- All elements
- Anchor link navigation
- Section jumping

**Behavior:**
- Native smooth scroll
- Hardware accelerated
- Respects user preferences

---

## ♿ Accessibility Features

### Reduced Motion Support

**Respects `prefers-reduced-motion`:**
```css
@media (prefers-reduced-motion: reduce) {
    - All animations: 0.01ms duration
    - Iterations: 1 (no loops)
    - Transitions: 0.01ms
    - Scroll: auto (no smooth)
}
```

**Benefits:**
- Users with vestibular disorders protected
- Motion-sensitive users comfortable
- Maintains functionality without animation

---

## 🎨 Special Effects

### Liquid Glass Navbar Shimmer

**Effect:** Subtle light sweep across navbar
**Duration:** 8 seconds
**Loop:** Infinite
**Movement:** Left to right gradient
**Opacity:** 0.6

### CTA Pulse Animation

**Class:** `.btn-pulse`
**Effect:** Breathing/pulsing scale effect
**Duration:** 2 seconds
**Loop:** Infinite
**Scale range:** 1.0 to 1.05
**Shadow:** Expanding blue ring

**Apply to HTML:**
```html
<button class="btn-primary btn-pulse">Click Me</button>
```

### Reveal Animation

**Class:** `.reveal-animation`
**Effect:** Horizontal wipe reveal
**Duration:** 1.2s
**Uses:** `clip-path` for smooth reveal
**Direction:** Left to right

### Wave Background

**Class:** `.wave-background`
**Effect:** Gentle floating movement
**Duration:** 15 seconds
**Pattern:** Figure-8 movement
**Movement:** ±2% translation

### Gradient Shift

**Class:** `.gradient-animate`
**Effect:** Animated gradient movement
**Duration:** 10 seconds
**Background size:** 200% 200%
**Creates:** Living, breathing backgrounds

---

## 🛠️ Implementation Details

### JavaScript Files

**Main Functions:**

1. **`updateParallax()`**
   - Calculates parallax positions
   - Updates transforms
   - Throttled with requestAnimationFrame

2. **`requestParallaxUpdate()`**
   - Throttles scroll events
   - Prevents performance issues
   - Uses RAF for smooth 60fps

3. **`animateCounter(element, target, duration)`**
   - Animates number from 0 to target
   - Maintains consistent framerate
   - Preserves number formatting

4. **Intersection Observers**
   - Detects elements entering viewport
   - Triggers animations once
   - Unobserves after animation
   - Improves performance

### CSS Variables Used

```css
--transition: all 0.3s ease
```

**Extended to:**
- Cubic-bezier timing functions
- Multi-property transitions
- Hardware acceleration hints

### Performance Optimizations

1. **Will-change property**
   - Applied to parallax elements
   - Enables GPU acceleration
   - Improves transform performance

2. **RequestAnimationFrame**
   - Syncs with browser refresh
   - Smooth 60fps animations
   - Prevents jank

3. **Throttling**
   - Prevents excessive calculations
   - Uses ticking flag pattern
   - Efficient scroll handling

4. **Observer Unsubscribe**
   - Removes observers after animation
   - Reduces ongoing calculations
   - Cleaner memory usage

---

## 📋 Animation Checklist

### Applied Animations

**Hero Section:**
- [x] Background parallax
- [x] Text slide-in from left
- [x] Image slide-in from right
- [x] Floating elements parallax
- [x] Stats counting animation
- [x] Image hover effect

**Services Section:**
- [x] Section header slide-down
- [x] 6 service cards staggered slide-up
- [x] Card hover with 3D tilt
- [x] Icon rotation on hover
- [x] Blob expansion on hover

**About Section:**
- [x] Text slide-in from left
- [x] Image slide-in from right
- [x] Team image parallax (inverse)
- [x] 4 metrics staggered scale-in
- [x] Number counting animation
- [x] Image hover effect

**Testimonials:**
- [x] Section header slide-down
- [x] Content bounce-in
- [x] Carousel transitions

**CTA Section:**
- [x] Content scale-in
- [x] Decorative elements floating
- [x] Button hover effects
- [x] Optional pulse animation

**Contact Section:**
- [x] Info slide-in from left
- [x] Form slide-in from right
- [x] Icon hover effects

**Global:**
- [x] Smooth scroll behavior
- [x] Page load fade-in
- [x] Button ripple effects
- [x] Reduced motion support
- [x] Liquid glass navbar shimmer

---

## 🎮 Usage Examples

### Adding Animation to New Element

**HTML:**
```html
<div class="my-element scroll-animate" data-animation="slide-up">
    Content here
</div>
```

**JavaScript:**
```javascript
const myElement = document.querySelector('.my-element');
observer.observe(myElement);
```

### Adding Pulse to Button

```html
<button class="btn-primary btn-pulse">Action</button>
```

### Adding Mouse Parallax to Card

```javascript
const card = document.querySelector('.my-card');
card.addEventListener('mousemove', (e) => {
    // Parallax calculation
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    // ... apply transforms
});
```

---

## 🔧 Customization

### Adjust Animation Speed

```css
.slide-up {
    animation: fadeInUp 0.8s ease forwards;
}
/* Change to faster: */
.slide-up {
    animation: fadeInUp 0.5s ease forwards;
}
```

### Adjust Parallax Speed

```javascript
// In updateParallax() function
heroImage.style.transform = `translateY(${scrollPercentage * 50}px)`;
// Change multiplier (50) to increase/decrease movement
```

### Adjust Hover Lift

```css
.service-card:hover {
    transform: translateY(-12px) scale(1.02);
}
/* Increase lift: */
.service-card:hover {
    transform: translateY(-20px) scale(1.02);
}
```

---

## 📊 Performance Metrics

**Animation Performance:**
- Target: 60fps
- Method: RequestAnimationFrame
- GPU: Accelerated transforms
- Memory: Efficient observer cleanup

**Scroll Performance:**
- Throttled scroll events
- Passive event listeners
- Will-change hints
- Minimal repaints

**Best Practices:**
- Use transforms over position
- Prefer opacity over visibility
- Minimize layout thrashing
- Batch DOM reads/writes

---

## 🎯 Animation Philosophy

**Principles:**
1. **Purposeful** - Each animation serves UX goal
2. **Performant** - Smooth 60fps on all devices
3. **Accessible** - Respects motion preferences
4. **Delightful** - Enhances without distracting
5. **Consistent** - Unified timing and easing

**Timing:**
- Quick interactions: 0.3s
- Element transitions: 0.4-0.8s
- Page loads: 0.5s
- Ambient animations: 8-20s

**Easing:**
- Standard: `cubic-bezier(0.4, 0, 0.2, 1)`
- Entrance: `ease-out`
- Exit: `ease-in`
- Playful: `ease-in-out`

---

## 📚 Resources

**CSS Animations:**
- MDN Animation Reference
- CSS Tricks Animation Guide

**JavaScript:**
- Intersection Observer API
- RequestAnimationFrame Guide

**Performance:**
- Web Vitals
- Chrome DevTools Performance

---

**Last Updated:** February 4, 2026  
**Status:** ✅ Production Ready  
**Performance:** Optimized for 60fps  
**Accessibility:** WCAG Compliant