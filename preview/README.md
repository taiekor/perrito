# Preview estático

Esta carpeta contiene una **vista previa HTML estática** del tema `perrito-feliz` para que puedas ver el sitio sin tener que instalar WordPress.

## Qué incluye

- `index.html` → Home completa (hero animado, trust strip, servicios, ambulancia band, equipo, planes, testimonios, CTA final, footer)
- `landing.html` → Landing page de Ambulancia Veterinaria 24/7 (ejemplo de los templates para Google Ads)

Ambos archivos cargan los mismos CSS, JS, SVG y fuentes reales que el tema WordPress, usando rutas relativas a `../theme/perrito-feliz/assets/`.

## Cómo abrirlo

Los archivos usan **ES modules** (`import/export`), así que los navegadores modernos exigen que se sirvan vía HTTP — no funcionan con `file://`.

### Opción 1: servidor simple de Python (recomendado)

Desde la raíz del repositorio:

```bash
cd /home/user/perrito
python3 -m http.server 8000
```

Luego abrí en el navegador:

- Home: http://localhost:8000/preview/index.html
- Landing: http://localhost:8000/preview/landing.html

### Opción 2: Node (si tenés `npx`)

```bash
cd /home/user/perrito
npx serve .
```

### Opción 3: VS Code Live Server

Abrí `preview/index.html` y hacé click derecho → **Open with Live Server**.

## Qué deberías ver

Al abrir `index.html` correctamente:

1. El **hero** aparece con animación stagger (el título se descompone en palabras y se anima cada una con delay)
2. Los **contadores** del hero y del trust strip suben de 0 al valor final
3. Las **secciones siguientes** aparecen con scroll reveal (fade + translateY) a medida que bajás
4. Los **SVG del hero** se dibujan con path draw
5. Las **cards** responden al hover
6. La **barra de urgencia** pulsa suavemente
7. El **header** cambia de fondo al hacer scroll

Si todo eso funciona en el preview, también va a funcionar en WordPress una vez instalado.

## Diferencias con la versión WordPress

El preview es **100% estático**. Esto significa:

- No hay carrito real (los botones "Agregar al carrito" se registran en localStorage pero no hay página `/carrito/` real en preview)
- Los links a URLs internas como `/servicios/` o `/equipo/` no resuelven (porque no hay routing)
- Los datos (nombres del equipo, servicios, etc.) están **hardcodeados** en el HTML y coinciden con lo que el seeder de WordPress crea al activar el tema

En producción (Hostinger + WordPress activado), todo esto se pobla dinámicamente desde los CPTs y el carrito funciona entre páginas.

## Limitaciones conocidas del preview

- `prefers-reduced-motion`: si tu SO tiene reduce motion activado, las animaciones no corren (comportamiento correcto, intencional)
- En Safari muy viejo (<14) los ES modules con imports pueden fallar. Usá Chrome/Firefox/Edge/Safari reciente
- Los tooltips y micro-interacciones avanzadas (como el shop filter con radios dinámicos) no están en el preview porque requieren contenido WP
