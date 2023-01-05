<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class CalculController extends AbstractController{

        public function testNumber($nbr):Response{
            if($nbr<=5){
                return new Response('Vrai');
            }
            else{
                return new Response('Faux');
            }
        }
        /**
        * @Route("/verifier/{nbr}")
        */ 
        public function testNumberV2($nbr):Response{
            if($nbr<=5){
                return new Response('Vrai');
            }
            else{
                return new Response('Faux');
            }
        }

        #[Route('/calculer/{nbr}', name: 'app_calculer')]
        public function testNumberV3($nbr):Response{
            if($nbr<=5){
                return new Response('Vrai');
            }
            else{
                return new Response('Faux');
            }
        }

        public function addition($nbr1, $nbr2):Response{
            return $this->render('calcul/index.html.twig', [
                'calcul' =>  $nbr1+$nbr2,
            ]);
        }

        /**
        * @Route("/addition/{nbr1}/{nbr2}")
        */ 
        public function addition2($nbr1, $nbr2):Response{
            return $this->render('calcul/index.html.twig', [
                'calcul' =>  $nbr1+$nbr2,
            ]);
        }
        #[Route('/operation/{nbr1}/{nbr2}', name: 'app_calculer_add')]
        public function addition3($nbr1, $nbr2):Response{
            return $this->render('calcul/index.html.twig', [
                'calcul' =>  $nbr1+$nbr2,
            ]);
        }
    }
?>