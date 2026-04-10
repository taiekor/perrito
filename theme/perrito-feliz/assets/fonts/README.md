# Fuentes

Este tema usa **Inter** (body) y **Fraunces** (headings), auto-hospedadas para mejor rendimiento.

## Estado

Las 7 variantes ya vienen incluidas en esta carpeta, listas para usar:

- `Inter-Regular.woff2` (400)
- `Inter-Medium.woff2` (500)
- `Inter-SemiBold.woff2` (600)
- `Inter-Bold.woff2` (700)
- `Fraunces-Regular.woff2` (400)
- `Fraunces-SemiBold.woff2` (600)
- `Fraunces-Bold.woff2` (700)

Las `@font-face` están registradas en `assets/css/base/typography.css` y apuntan a estos archivos con rutas relativas.

## Origen

Las fuentes fueron descargadas desde [Fontsource](https://fontsource.org/) vía jsdelivr CDN (subset latin), que distribuye tipografías open source optimizadas para auto-hosting.

## Licencias

- **Inter**: [SIL Open Font License 1.1](https://github.com/rsms/inter/blob/master/LICENSE.txt) — libre uso comercial
- **Fraunces**: [SIL Open Font License 1.1](https://github.com/undercasetype/Fraunces/blob/master/OFL.txt) — libre uso comercial

## Cómo reemplazar o actualizar

Si querés cambiar las variantes (por ejemplo agregar `italic` o más pesos), reemplazá los archivos `.woff2` conservando los nombres exactos y actualizá `base/typography.css` si añadís variantes nuevas.
