# BitField Form Type Bundle

## Installation

Add the following to your deps file:

    [ColinFreiBitFieldFormTypeBundle]
        git=http://github.com/colinfrei/Symfony-Bitfield-Form-Type-Bundle.git
        target=bundles/ColinFrei/BitFieldTypeBundle

Register the `ColinFrei` namespace in the app/autoload.php file, by adding this line in the `$loader->registerNamespaces(array(` array:

    'ColinFrei'        => __DIR__.'/../vendor/bundles',

Register the bundle in your app/AppKernel.php file, by adding this line in the `bundles` array in the registerBundles() function:

    new ColinFrei\BitFieldTypeBundle\ColinFreiBitFieldTypeBundle(),


## Usage

Use the `BitfieldType` class when adding fields to the form, and pass in an array of options, like the type line in this example from the [Symfony documentation](http://symfony.com/doc/current/book/forms.html#building-the-form):

    use ColinFrei\BitFieldTypeBundle\Form\Type\BitfieldType;
    
    $form = $this->createFormBuilder($task)
        ->add('task', 'text')
        ->add('dueDate', 'date')
        ->add('type', BitfieldType::class, array(
            'choices' => array('Annoying' => '1', 'Fun' => '2', 'Cool' => '4', 'Takes a while' => '8'),
            'choices_as_values' => true
        )
        ->getForm();