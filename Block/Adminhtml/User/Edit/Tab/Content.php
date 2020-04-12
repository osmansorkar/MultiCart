<?php
namespace OsmanSorkar\MultiCart\Block\Adminhtml\User\Edit\Tab;
use Magento\Backend\Block\Widget\Tab\TabInterface;

/**
 * Cms page edit form main tab
 */
class Content extends \Magento\Backend\Block\Widget\Form\Generic implements TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_sellerProfile;

    protected $_request;

    /**
     * Content constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \OsmanSorkar\MultiCart\Model\Profile $sellerProfile,
        \Magento\Framework\App\Request\Http $request,
        array $data = []
    ) {
        $this->_sellerProfile = $sellerProfile;
        $this->_request = $request;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {

        if($this->_request->has("user_id")){
            $userId = $this->_request->get("user_id");

            $model = $this->_sellerProfile->loadProfileById($userId);
        }else{
            $model = $this->_sellerProfile;
        }
        /** @var $model \OsmanSorkar\Options2Attribute\Model\Post */


        /*
         * Checking if user have permissions to save information
         */
        if ($this->_isAllowedAction('OsmanSorkar_Blog::save')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('seller_');


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
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'shop_name',
            'text',
            [
                'name' => 'shop_name',
                'label' => __('Shope Name'),
                'title' => __('Shope Name'),
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'admin_commission',
            'text',
            [
                'name' => 'admin_commission',
                'label' => __('Commisshion Cut'),
                'title' => __('Commisshion Cut'),
                'disabled' => $isElementDisabled
            ]
        );
        $fieldset->addField(
            'total_admin_commission',
            'text',
            [
                'name' => 'total_admin_commission',
                'label' => __('Total Due Comission'),
                'title' => __('Total Due Comission'),
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'total_seller_amount',
            'text',
            [
                'name' => 'total_seller_amount',
                'label' => __('Have Pay amount'),
                'title' => __('Have Pay amount'),
                'disabled' => $isElementDisabled
            ]
        );

        $fieldset->addField(
            'total_seller_paid',
            'text',
            [
                'name' => 'total_seller_paid',
                'label' => __('Have to Pay amount'),
                'title' => __('Have to Pay amount'),
                'disabled' => $isElementDisabled
            ]
        );

        $this->_eventManager->dispatch('adminhtml_multicart_user_edit_tab_content_prepare_form', ['form' => $form]);
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Seller Profile');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Seller Profile');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
