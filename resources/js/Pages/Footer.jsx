import logo from "./../../img/logo-blanco.webp";
import indexcss from "./../../css/index.module.css";
import {
    Facebook,
    Instagram,
    LinkedIn,
    LocalPhone,
    MailOutline,
} from "@mui/icons-material";
import { Link, usePage } from "@inertiajs/react";

export default function Footer() {
    const { url } = usePage();
    return (
        <footer>
            <div
                style={{ display: `flex`, flexDirection: `column` }}
                className="container flex-md-row justify-content-center justify-content-md-between"
            >
                <div className="d-flex justify-content-md-end align-items-center pb-4">
                    <img
                        src={logo}
                        alt="LogoFooter"
                        title="SysifosWeb"
                        height="50rem"
                    />
                </div>
                <div
                    className={`d-flex flex-column justify-content-md-start mb-4 mb-md-0 ${indexcss.dir}`}
                >
                    <div className="mb-3 text-start">Páginas</div>
                    <div className="d-flex align-items-center mb-3">
                        <Link
                            href="/"
                            title="Home"
                            aria-current="page"
                            className={`nav-link
                                        ${url === "/" ? "active" : ""}
                                    `}
                        >
                            Home
                        </Link>
                    </div>
                    <div className="d-flex align-items-center mb-3">
                        <Link
                            href="/nosotros"
                            title="Nosotros"
                            aria-current="page"
                            className={`nav-link
                                        ${url === "/nosotros" ? "active" : ""}
                                    `}
                        >
                            Nosotros
                        </Link>
                    </div>
                    <div className="d-flex align-items-center mb-3">
                        <Link
                            href="/servicios"
                            title="Servicios"
                            aria-current="page"
                            className={`nav-link
                                        ${url === "/servicios" ? "active" : ""}
                                    `}
                        >
                            Servicios
                        </Link>
                    </div>
                    <div className="d-flex align-items-center mb-3">
                        <Link
                            href="/contacto"
                            title="Contacto"
                            aria-current="page"
                            className={`nav-link
                                        ${url === "/contacto" ? "active" : ""}
                                    `}
                        >
                            Contacto
                        </Link>
                    </div>
                </div>
                <div
                    className={`d-flex flex-column justify-content-md-start mb-4 mb-md-0 ${indexcss.dir}`}
                >
                    <div className="mb-3 text-start">Contactanos</div>
                    <div className="d-flex align-items-center mb-3">
                        <a
                            href="tel:+56949109970"
                            title="Llamar"
                            className={`${indexcss.link}`}
                        >
                            <LocalPhone fontSize="large" sx={{ mr: 1 }} />
                            +56949109970
                        </a>
                    </div>
                    <div className="d-flex align-items-center mb-3">
                        <MailOutline fontSize="large" sx={{ mr: 1 }} />
                        contacto@sysifosweb.cl
                    </div>
                    <div className="d-flex align-items-center mb-3">
                        <a
                            href="https://www.instagram.com/sysifosweb_/"
                            target="_blank"
                            title="Instagram"
                            className={`${indexcss.link}`}
                        >
                            <Instagram fontSize="large" sx={{ mr: 1 }} />
                            sysifosweb_
                        </a>
                    </div>
                    <div className="d-flex align-items-center mb-3">
                        <a
                            href="https://www.facebook.com/profile.php?id=61567859694020"
                            target="_blank"
                            title="Facebook"
                            className={`${indexcss.link}`}
                        >
                            <Facebook fontSize="large" sx={{ mr: 1 }} />
                            Sysifosweb
                        </a>
                    </div>
                    <div className="d-flex align-items-center mb-3">
                        <a
                            href="https://www.linkedin.com/company/sysifos-web/"
                            target="_blank"
                            title="LinkedIn"
                            className={`${indexcss.link}`}
                        >
                            <LinkedIn fontSize="large" sx={{ mr: 1 }} />
                            Sysifos Web
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    );
}
