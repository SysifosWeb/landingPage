import Header from "./../Header";
import Contact from "./../Contact";
import Footer from "./../Footer";
import { Head } from "@inertiajs/react";
import "./../../../css/main.css";

const Blog = () => {
    return (
        <>
            <Head>
                <title>Blog - Sysifos Web</title>
                <meta name="description" content="pagina de nosotros" />
            </Head>
            <Header />
            <Contact />
            <Footer />
        </>
    );
};

export default Blog;
