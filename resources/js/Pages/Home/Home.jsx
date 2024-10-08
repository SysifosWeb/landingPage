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
                <title>Sysifos Web Soluciones digitales</title>
                <meta
                    name="description"
                    content="Desarrollamos aplicaciones web y software personalizados para impulsar tu negocio. Aumenta tus ventas, mejora la experiencia del cliente y diferencia tu marca."
                />
            </Head>
            <Header />
            <Service />
            <Contact />
            <Footer />
        </>
    );
};

export default Home;
