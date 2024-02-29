<?php

namespace App\Form;

use App\Entity\Receipt;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceiptType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('shop', EntityType::class, [
                'class' => 'App\Entity\Shop',
                'choice_label' => 'name',
                'label' => 'Sklep '
            ])
            ->add('create_at', DateTimeType::class, ['label' => 'Data paragonu '])
            ->add('product', EntityType::class, [
                'class' => 'App\Entity\Product',
                'choice_label' => 'name',
                'label' => 'Produkt '
            ])
            ->add('price', MoneyType::class,
                [
                    'label' => 'Cena ',
                    'currency' => 'PLN'
                ])
            ->add('quantity', IntegerType::class, [
                'label' => 'Ilość ',
                'attr' => [
                    'min' => 1,
                    'value' => 1
                    ]

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Receipt::class,
        ]);
    }
}
