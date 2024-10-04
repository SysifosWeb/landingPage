import Header from "../HeaderPages";
import Footer from "./../Footer";
import Contact from "./../Contact";
import { Head } from "@inertiajs/react";
import "./../../../css/main.css";
import ours from "./../../../css/nosotros.module.css";
import equipo from "./../../../img/equipoMin.webp";
import osman from "./../../../img/Osman.png";
import karen from "./../../../img/Karen.png";
const Nosotros = () => {
    return (
        <>
            <Head>
                <title>Nosotros - Sysifos Web</title>
                <meta name="description" content="pagina de nosotros" />
            </Head>
            <Header title={"Quienes Somos?"} />
            <div className="main">
                <div className="container py-5">
                    <section className={`row`} id="history-company">
                        <div className={`d-flex flex-row pb-4`}>
                            <div
                                id="our-img"
                                className="col-12 col-md-6 d-flex align-items-center justify-content-center"
                            >
                                <img src={equipo} height="250" alt="" />
                            </div>
                            <div
                                id="our-text"
                                className={`${ours.history_text} col-6 d-flex flex-column`}
                            >
                                <h2 className="text-start">
                                    Nuestra Historia.
                                </h2>
                                <p>
                                    En SysifosWeb somos un equipo apasionado por
                                    transformar ideas en soluciones digitales
                                    innovadoras y excepcionales. Fundada en 2024
                                    por tres amigos informáticos con diversas
                                    especialidades, nuestra empresa tiene como
                                    objetivo liderar el desarrollo de software
                                    en la región de Coquimbo. Contamos con un
                                    equipo altamente capacitado y comprometido
                                    con la formación continua, lo que nos
                                    permite ofrecer soluciones de alta calidad.
                                    Nuestro talento y dedicación son la clave
                                    para superar las expectativas de nuestros
                                    clientes.
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
                <section className={`${ours.profile}`} id="profile">
                    <div className="container">
                        <div
                            className={`row d-flex justify-content-center align-items-center gap-5`}
                        >
                            <div className={`${ours.card_our} col-lg-3`}>
                                <div className={`${ours.card_img}`}>
                                    <img
                                        src={osman}
                                        alt="osman"
                                        className="mb-5"
                                    />
                                </div>
                                <h4 className={`mt-5 pt-5 mb-1`}>
                                    Osman Ahumada
                                </h4>
                                <small className={`mb-3`}>
                                    Web & Mobile Developer
                                </small>
                                <p className={`text-center`}>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Maxime maiores rem
                                    voluptatem
                                </p>
                            </div>
                            <div className={`${ours.card_our} col-lg-3`}>
                                <div className={ours.card_img}>
                                    <img src={karen} alt="" />
                                </div>
                                <h4 className={`mt-5 pt-5 mb-1`}>
                                    Karen Godoy
                                </h4>
                                <small className={`mb-3`}>
                                    Web & Mobile Developer
                                </small>
                                <p className={`text-center`}>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Maxime maiores rem
                                    voluptatem
                                </p>
                            </div>
                            <div className={`${ours.card_our} col-lg-3`}>
                                <div className={ours.card_img}>
                                    <img src={karen} alt="" />
                                </div>
                                <h4 className={`mt-5 pt-5 mb-1`}>
                                    Osman Ahumada
                                </h4>
                                <small className={`mb-3`}>
                                    Web & Mobile Developer
                                </small>
                                <p className={`text-center`}>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Maxime maiores rem
                                    voluptatem
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                {/* <div className="container py-5">
                    <section id="info-company">
                        <div className="py-5"></div>
                        <dir className="d-flex justify-content-evenly">
                            <div className="card mb-3 text-center shadow col-12 col-md-5">
                                <div className="card-body ">
                                    <h4 className="card-title py-3">Mision</h4>
                                    <p className="card-text">
                                        En SysifosWeb, nuestra misión es liderar
                                        el sector tecnológico en la región
                                        ofreciendo soluciones digitales
                                        altamente personalizadas que transformen
                                        las ideas de nuestros clientes en
                                        aplicaciones móviles y sitios web
                                        innovadores. Nos comprometemos a abordar
                                        las necesidades de nuestros clientes con
                                        flexibilidad y eficiencia, garantizando
                                        una experiencia de usuario excepcional.
                                        Aprovechamos nuestra experiencia y
                                        habilidades para brindar soluciones
                                        únicas que impacten positivamente en sus
                                        negocios y que se adapten a las
                                        exigencias del mercado.
                                    </p>
                                </div>
                            </div>
                            <div className="card mb-3 text-center shadow col-5">
                                <div className="card-body">
                                    <h4 className="card-title py-3">Vision</h4>
                                    <p className="card-text">
                                        En los próximos cinco años, SysifosWeb
                                        aspira a ser el referente en el mercado
                                        chileno, consolidándose como líder en el
                                        desarrollo de software mediante la
                                        adquisición de nuevos clientes y
                                        proyectos, y mejorando nuestra
                                        estabilidad financiera y rentabilidad.
                                        Nos enfocaremos en la formación y
                                        retención del talento humano para
                                        asegurar un equipo capacitado y
                                        motivado. Buscamos ser ágiles y
                                        adaptables a los cambios tecnológicos y
                                        regulatorios, destacándonos por nuestra
                                        calidad y servicio al cliente.
                                        Innovaremos constantemente mediante la
                                        implementación de metodologías ágiles,
                                        prácticas DevOps, y soluciones avanzadas
                                        en seguridad y sostenibilidad. Nuestra
                                        meta es marcar la diferencia en el
                                        mercado con productos de alta calidad y
                                        un enfoque en la experiencia del
                                        usuario, contribuyendo positivamente a
                                        la sociedad y al entorno empresarial.
                                    </p>
                                </div>
                            </div>
                        </dir>
                    </section>
                </div> */}
            </div>
            <Contact />
            <Footer />
        </>
    );
};

export default Nosotros;
