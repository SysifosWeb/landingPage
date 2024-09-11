import indexcss from "./../../css/index.module.css";
import logo from "../../img/logo-blanco.webp";
import { usePage, Link } from "@inertiajs/react";
const Menu = () => {
    const { url } = usePage();
    return (
        <>
            <nav className="navbar navbar-expand-lg navbar-dark bg-transparent container">
                <div className="container">
                    <a className="navbar-brand" href="/">
                        <img
                            src={logo}
                            className={indexcss.logo}
                            alt="Logo"
                            aria-label="Go home"
                        />
                    </a>
                    <button
                        className="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div
                        className="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <ul className="navbar-nav me-auto mb-2 mb-lg-0 mt-3 ms-4">
                            <li className="nav-item">
                                <Link
                                    href="/"
                                    aria-current="page"
                                    className={`nav-link
                                        ${url === "/" ? "active" : ""}
                                    `}
                                >
                                    Home
                                </Link>
                            </li>
                            <li className="nav-item">
                                <Link
                                    href="/nosotros"
                                    aria-current="page"
                                    className={`nav-link
                                        ${url === "/nosotros" ? "active" : ""}
                                    `}
                                >
                                    Nosotros
                                </Link>
                            </li>
                            <li className="nav-item">
                                <Link
                                    href="/servicios"
                                    aria-current="page"
                                    className={`nav-link
                                        ${url === "/servicios" ? "active" : ""}
                                    `}
                                >
                                    Servicios
                                </Link>
                            </li>
                            <li className="nav-item">
                                <Link
                                    href="/contacto"
                                    aria-current="page"
                                    className={`nav-link
                                        ${url === "/contacto" ? "active" : ""}
                                    `}
                                >
                                    Contacto
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </>
    );
};

export default Menu;
