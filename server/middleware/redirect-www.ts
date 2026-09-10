export default defineEventHandler((event) => {
  const host = getRequestHeader(event, 'host')

  if (!host) return

  // Normalizar: minúsculas y quitar puerto (p. ej. "www.sysifosweb.cl:443")
  const hostname = host.toLowerCase().split(':')[0]

  if (hostname === 'www.sysifosweb.cl') {
    return sendRedirect(event, `https://sysifosweb.cl${event.path}`, 301)
  }
})
