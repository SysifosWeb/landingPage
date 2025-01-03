import Service from "./../service";
import Footer from "./../Footer";
import Header from "./../Header";
import Contact from "./../Contact";
import { Head } from "@inertiajs/react";
import "./../../../css/main.css";
const Home = () => {
    return (
        <>
            <Head>
                <title>SysifosWeb Soluciones Informáticas Limitada</title>
                <meta
                    head-key="description"
                    name="description"
                    content="Creamos aplicaciones móviles, diseñamos sitios web y ofrecemos consultoría tecnológica para impulsar tu negocio. ¡Contacta con nosotros!"
                />

                <meta
                    property="og:title"
                    content="SysifosWeb Soluciones Informáticas Limitada"
                />
                <meta
                    property="og:description"
                    content="Creamos aplicaciones móviles, diseñamos sitios web y ofrecemos consultoría tecnológica para impulsar tu negocio. ¡Contacta con nosotros!"
                />
                <meta property="og:url" content="https://www.sysifosweb.cl/" />
                <meta
                    property="og:image"
                    content="https://www.sysifosweb.cl/assets/equipoMin-ijW4D7nV.webp"
                />
                <meta property="og:image:width" content="1200" />
                <meta property="og:image:height" content="627" />
                <meta property="fb:app_id" content="1215450019494398" />
                <meta property="og:locale" content="es_LA" />
                <meta property="og:type" content="website" />
                <meta property="og:site_name" content="Sysifos Web" />
                <meta property="og:share_count" content="true" />
            </Head>
            <Header />
            <Service />
            <Contact />
            <Footer />
        </>
    );
};

export default Home;
