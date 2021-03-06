<?php

namespace StagBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LessonType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		
		$builder->add('courseRef', EntityType::class, [
			"label" => "Kurz",
			"class" => "StagBundle:Course",
			"choice_label" => "name",
			"expanded" => false,
			"multiple" => false
		]);
		
		$builder->add('time', DateTimeType::class, [
			"label" => "Čas",
			"widget" => "single_text",
			"format" => "d.M.yyyy HH:mm",
		]);
		
		$builder->add('length', IntegerType::class, ["label" => "Délka"]);
		$builder->add('level', TextType::class, ["label" => "Úroveň", "required" => false]);
		$builder->add('lecturer', TextType::class, ["label" => "Lektor", "required" => false]);
		$builder->add('description', TextType::class, ["label" => "Popis", "required" => false]);

		$builder->add('save', SubmitType::class, ["label" => "Uložit"]);
	}
}