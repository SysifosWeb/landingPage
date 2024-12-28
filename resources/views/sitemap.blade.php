{!!

    Sitemap::create()
       ->add(URL::to('/'), Carbon::now(), '0.4', 'daily')
       ->add(URL::to('/nosotros'), Carbon::now(), '0.3', 'monthly')
       ->add(URL::to('/servicios'), Carbon::now(), '0.2', 'weekly')
       ->add(URL::to('/contacto'), Carbon::now(), '0.1', 'monthly')      
       ->write();
       
!!}