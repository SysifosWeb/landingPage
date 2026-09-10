export default defineEventHandler((event) => {
  const host = getRequestHeader(event, 'host')
  
  if (host === 'www.sysifosweb.cl') {
    return sendRedirect(event, `https://sysifosweb.cl${event.path}`, 301)
  }
})
