import Header from "./../HeaderPages";
// import Contact from "./../Contact";
import Footer from "./../Footer";
import { Head } from "@inertiajs/react";
import { Check } from "@mui/icons-material";
import "./../../../css/main.css";
import service from "./../../../css/servicios.module.css";

const Servicios = () => {
    return (
        <>
            <Head>
                <title>Servicios | Sysifos Web</title>
                <meta name="description" content="pagina de nosotros" />
            </Head>
            <Header title={"Nuestros Servicios"} />
            <main>
                <section className={service.web} id="paginasWeb">
                    <div className="container">
                        <div className="row">
                            <div className="col-12">
                                <h1 className="text-center py-4">
                                    Paginas webs
                                </h1>
                                <p
                                    className={`text-justify ${service.parrafo}`}
                                >
                                    Posicionamos tu negocio en internet, y te
                                    acercamos a más clientes!, con un diseño de
                                    pagina enfocado en lo que ofreces, y con
                                    compatibilidad en la mayoria de los
                                    dispositivos del mercado
                                </p>
                            </div>
                        </div>
                        <div className="row">
                            <div className="d-flex d-flex align-items-center justify-content-center my-5">
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table}`}
                                >
                                    <small>Sitio estático</small>
                                    <h4>Plan basico</h4>
                                    <p className={service.price}>185.640</p>
                                    <small>iva incluido</small>
                                    <ul className="mt-4 list-group list-group-flush">
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Hosting anual
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Dominio .cl x 1 año
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Correos Corporativos
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Menú de 3 Secciones
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Certificado SSL
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />1 mes de
                                            Manteción
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Autoadministrable
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            1gb de Almacenamiento
                                        </li>
                                    </ul>
                                    <button className="btn btn-primary mt-4">
                                        Obtener Plan
                                    </button>
                                </div>
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table} ${service.pro}`}
                                >
                                    <small>Sitio dinámico</small>
                                    <h4>Plan emprendedor</h4>
                                    <p className={service.price}>297.500</p>
                                    <small>iva incluido</small>
                                    <ul className="mt-4 list-group list-group-flush">
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Hosting anual
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Dominio .cl x 1 año
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Correos Corporativos
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Menú de 5 Secciones
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Certificado SSL
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />2 meses de
                                            Manteción
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Autoadministrable
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            2gb de Almacenamiento
                                        </li>
                                        <li className="list-group-item text-white bg-transparent">
                                            <Check className="me-2" />
                                            Botón de whatsapp
                                        </li>
                                    </ul>
                                    <div className="d-grid">
                                        <button
                                            className="btn btn-light mt-4"
                                            type="button"
                                        >
                                            Obtener Plan
                                        </button>
                                    </div>
                                </div>
                                <div
                                    className={`col-lg-4 d-flex flex-column align-items-center justy-content-center ${service.price_table}`}
                                >
                                    <small>Sitio dinámico</small>
                                    <h4>Plan premium</h4>
                                    <p className={service.price}>476.000</p>
                                    <small>iva incluido</small>
                                    <ul className="mt-4 list-group list-group-flush">
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Hosting anual
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Dominio .cl x 2 años
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Correos Corporativos
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Menú de 10 Secciones
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Certificado SSL
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />3 meses de
                                            Manteción
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Autoadministrable
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            3gb de Almacenamiento
                                        </li>
                                        <li className="list-group-item">
                                            <Check className="me-2" />
                                            Botón de whatsapp
                                        </li>
                                    </ul>
                                    <button className="btn btn-primary mt-4">
                                        Obtener Plan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section className="" id="aplicacionesMedida"></section>
                <section className="" id="appsMobile"></section>
            </main>
            {/* <Contact /> */}
            <Footer />
        </>
    );
};

export default Servicios;
