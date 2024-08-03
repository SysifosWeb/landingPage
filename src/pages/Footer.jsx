import logo from '../img/logo-blanco.webp'
import indexcss from '../css/index.module.css'
import { Instagram, LocalPhone, MailOutline } from '@mui/icons-material'

export default function Footer() {
  return (
    <footer>
      <div
        style={{ display: `flex`, flexDirection: `column` }}
        className="container flex-md-row justify-content-center justify-content-md-between"
      >
        <div className="d-flex justify-content-md-end align-items-center pb-4">
          <img src={logo} alt="Logo" height="50rem" />
        </div>
        <div className={`d-flex flex-column justify-content-md-start ${indexcss.dir}`}>
          <div className="mb-3 text-start">Contactanos</div>
          <div className="d-flex align-items-center mb-3">
            <LocalPhone fontSize="large" sx={{ mr: 1 }} />
            +56949109970
          </div>
          <div className="d-flex align-items-center mb-3">
            <MailOutline fontSize="large" sx={{ mr: 1 }} />
            sysifosweb@gmail.com
          </div>
          <div className="d-flex align-items-center mb-3">
            <Instagram fontSize="large" sx={{ mr: 1 }} />
            sysifosweb_
          </div>
        </div>
      </div>
    </footer>
  )
}
