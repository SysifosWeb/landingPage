import ReactDOM from 'react-dom/client'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import { HeadProvider } from 'react-head'
import Index from './Index'
import './main.css'
ReactDOM.createRoot(document.getElementById(`root`)).render(
  <HeadProvider>
    <Index />
  </HeadProvider>,
)
