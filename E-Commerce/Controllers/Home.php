<?php
// include_once('Libraries/Core/Controllers.php');
Class Home{
    public function __construct(){
        // parent::__construct();
    }
    public function Home(){        
        $data['page_id'] = 1;
        $data['tag_page'] = "Home";
        $data['page_title'] = "Pagina Principal";
        $data['page_name'] = "home";
        $data['page_content'] = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam neque quae sint mollitia veniam inventore sit ex voluptatem amet facere ipsam tempore, laudantium aliquam corrupti optio aut expedita ipsa quod.
        Doloremque, nulla quae. Non, sapiente cumque minima consequatur vitae eligendi odit facere harum facilis, commodi quaerat ad expedita, doloremque asperiores officia delectus aliquam fugiat nisi? Accusamus harum repudiandae esse nemo!
        Eos eligendi adipisci architecto nemo accusamus temporibus praesentium delectus? Ipsam ab, quos voluptas eos doloribus enim dolore placeat. Cumque repellendus labore quaerat eaque quidem iste, eos quos impedit beatae voluptates!
        Quidem esse dolor officiis necessitatibus ipsam! Eos a expedita similique error eaque, dignissimos exercitationem, impedit ducimus quia quaerat molestiae maiores velit, quasi sunt vel aliquid suscipit repellat voluptatibus beatae quae.
        Veniam, porro obcaecati! Hic cumque, aliquid nesciunt magni corrupti consequatur debitis quidem voluptatem. A dolores neque est. Odit eligendi cum dignissimos, accusamus modi non consectetur voluptatibus repellendus quisquam numquam mollitia?
        Odio dolorum enim laboriosam necessitatibus nihil, ut placeat quo fugiat similique expedita dolore magnam, ratione perspiciatis est autem officia numquam ducimus quas saepe reiciendis? Ipsa facilis illum veritatis harum totam!
        Nisi possimus voluptate eos rem optio asperiores voluptates sapiente modi reiciendis unde quae odio obcaecati, consectetur ipsam illum voluptatibus fugit corrupti id tempore et. Non temporibus itaque sunt consectetur ducimus!
        Aliquam asperiores facere maiores atque laboriosam sed officia aspernatur eos, ut earum, soluta eum veritatis reprehenderit? Laudantium neque ullam qui ad consectetur consequatur, exercitationem modi quos totam ab alias voluptates!
        Error eius impedit ea consectetur eaque blanditiis eos ab, iure fugit doloremque quod, aperiam iusto possimus numquam! Maxime sequi, et excepturi assumenda iusto nobis minus consequuntur est eos, recusandae quisquam.
        Cumque recusandae, voluptas laborum dolores consectetur voluptate fugit ipsam, minus alias ipsum minima fugiat, deleniti nam accusantium nulla distinctio cupiditate harum doloremque vel sed pariatur tempora reprehenderit exercitationem? Dolor, distinctio!";
        // $this->views->getView($this,"home",$data);
        print_r($data);
    }
    public function Insertar(){
        $data = $this->model->setUser("Carlos",18);
        print_r($data);
    }
    public function Datos($datos){
        echo $datos;
    }
}

?>