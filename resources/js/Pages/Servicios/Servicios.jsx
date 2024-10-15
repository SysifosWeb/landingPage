import Header from "./../HeaderPages";
// import Contact from "./../Contact";
import Footer from "./../Footer";
import { Head } from "@inertiajs/react";
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
                                <p className="text-center">
                                    Posicionamos tu negocio en internet, y te
                                    acercamos a más clientes!, con un diseño de
                                    pagina enfocado en lo que ofreces, y con
                                    compatibilidad en la mayoria de los
                                    dispositivos del mercado
                                </p>
                            </div>
                        </div>
                        <div className="row d-flex align-items-center justify-content-evenly my-5">
                            <div
                                className={`col-lg-3 d-flex flex-column align-items-center justy-content-center ${service.price_table}`}
                            >
                                <h4>Plan basico</h4>
                                <p>$1.000.000 clp</p>
                                <ul className="mt-4">
                                    <li>✔️ Awesome features</li>
                                    <li>✔️ Awesome features</li>
                                    <li>✔️ Awesome features</li>
                                    <li>✔️ Awesome features</li>
                                    <li>✔️ Awesome features</li>
                                    <li>✔️ Awesome features</li>
                                    <li>✔️ Awesome features</li>
                                    <li>✔️ Awesome features</li>
                                </ul>
                                <button className="btn btn-primary">
                                    Obtener Plan
                                </button>
                            </div>
                            <div
                                className={`col-lg-3 d-flex flex-column align-items-center justy-content-center ${service.price_table} ${service.pro}`}
                            >
                                <h4>Plan profesional</h4>
                                <p>$3.000.000 clp</p>
                                <ul className="mt-4">
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                </ul>
                                <div className="d-grid">
                                    <button
                                        className="btn btn-light"
                                        type="button"
                                    >
                                        Obtener Plan
                                    </button>
                                </div>
                            </div>
                            <div
                                className={`col-lg-3 d-flex flex-column align-items-center justy-content-center ${service.price_table}`}
                            >
                                <h4>Plan empresarial</h4>
                                <p>$10.000.000 clp</p>
                                <ul className="mt-4">
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                    <li>Awesome features</li>
                                </ul>
                                <button className="btn btn-primary">
                                    Obtener Plan
                                </button>
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
