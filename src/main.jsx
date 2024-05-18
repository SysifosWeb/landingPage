import ReactDOM from 'react-dom/client'
import ThemeProvider from './web/theme'
import Index from './web/Index'
import Home from './web/Pages/Home'
import Nosotros from './web/Pages/Nosotros'
import Contacto from './web/Pages/Contacto'
import { createBrowserRouter, RouterProvider } from 'react-router-dom'

const router = createBrowserRouter([
  {
    path: `/`,
    element: <Index />,
    children: [
      {
        path: ``,
        element: <Home />,
      },
      {
        path: `Nosotros`,
        element: <Nosotros />,
      },
      {
        path: `Contacto`,
        element: <Contacto />,
      },
    ],
  },
])

ReactDOM.createRoot(document.getElementById(`root`)).render(
  <ThemeProvider>
    <RouterProvider router={router} />
  </ThemeProvider>,
)
