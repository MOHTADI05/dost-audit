#!/usr/bin/env python3
"""Generate favicon.png with bold D for DOST'AUDIT - run once then delete."""
from PIL import Image, ImageDraw, ImageFont

SIZE = 64  # 64x64 for crisp favicon
BG = (55, 129, 174)  # #3781AE brand blue
FG = (255, 255, 255)  # white

img = Image.new("RGB", (SIZE, SIZE), BG)
draw = ImageDraw.Draw(img)

# Try system font, fallback to default
try:
    font = ImageFont.truetype("arial.ttf", 52)
except OSError:
    try:
        font = ImageFont.truetype("C:/Windows/Fonts/arialbd.ttf", 52)
    except OSError:
        font = ImageFont.load_default()

# Draw centered D - adjust bbox for centering
text = "D"
bbox = draw.textbbox((0, 0), text, font=font)
w, h = bbox[2] - bbox[0], bbox[3] - bbox[1]
x = (SIZE - w) // 2 - bbox[0]
y = (SIZE - h) // 2 - bbox[1]
draw.text((x, y), text, fill=FG, font=font)

img.save("images/favicon.png", "PNG")
print("Created images/favicon.png")
