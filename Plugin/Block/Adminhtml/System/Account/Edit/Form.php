<?php
namespace OsmanSorkar\MultiCart\Plugin\Block\Adminhtml\System\Account\Edit;

class Form
{
    protected $_authSession;
    protected $_sellerProfile;
    public function __construct(
        \Magento\Backend\Model\Auth\Session $authSession,
        \OsmanSorkar\MultiCart\Model\Profile $sellerProfile
    )
    {
        $this->_authSession = $authSession;
        $this->_sellerProfile = $sellerProfile;
    }

    /**
     * Get form HTML
     *
     * @return string
     */
    public function aroundGetFormHtml(
        \Magento\Backend\Block\System\Account\Edit\Form $subject,
        \Closure $proceed
    )
    {
        $form = $subject->getForm();
        if (is_object($form)) {

            $userId = $this->_authSession->getUser()->getId();

            $model = $this->_sellerProfile->loadProfileById($userId);

            $fieldset = $form->addFieldset(
                'content_fieldset',
                ['legend' => __('Seller Profile'), 'class' => 'fieldset-wide']
            );

            $fieldset->addField(
                'image',
                'text',
                [
                    'name' => 'image',
                    'label' => __('Seller Profile Image'),
                    'title' => __('Seller Profile Image'),
                ]
            );

            $fieldset->addField(
                'shop_name',
                'text',
                [
                    'name' => 'shop_name',
                    'label' => __('Shope Name'),
                    'title' => __('Shope Name'),
                ]
            );

            $fieldset->addField(
                'admin_commission',
                'text',
                [
                    'name' => 'admin_commission',
                    'label' => __('Commisshion Cut'),
                    'title' => __('Commisshion Cut'),
                    'disabled' => true
                ]
            );
            $fieldset->addField(
                'total_admin_commission',
                'text',
                [
                    'name' => 'total_admin_commission',
                    'label' => __('Total Due Comission'),
                    'title' => __('Total Due Comission'),
                    'disabled' => true
                ]
            );

            $fieldset->addField(
                'total_seller_amount',
                'text',
                [
                    'name' => 'total_seller_amount',
                    'label' => __('Have Pay amount'),
                    'title' => __('Have Pay amount'),
                    'disabled' => true
                ]
            );

            $fieldset->addField(
                'total_seller_paid',
                'text',
                [
                    'name' => 'total_seller_paid',
                    'label' => __('Have to Pay amount'),
                    'title' => __('Have to Pay amount'),
                    'disabled' => true
                ]
            );

            $form->addValues($model->getData());
            $subject->setForm($form);
        }

        return $proceed();
    }
}