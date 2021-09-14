<?php
namespace Bstream\CallMeBack\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Bstream\CallMeBack\Api\Data\CallBackInterface;
use Bstream\CallMeBack\Api\CallBackRepositoryInterface;
use Bstream\CallMeBack\Model\ResourceModel\CallBackFactory as ResourceFactory;
use Bstream\CallMeBack\Model\CallBackFactory as CallBackFactory;

/**
 * Class CallBackRepository
 * @package Bstream\CallMeBack\Model
 */
class CallBackRepository implements CallBackRepositoryInterface
{
    /**
     * @var ResourceFactory
     */
    private $resourceFactory;

    /**
     * @var CallBackFactory
     */
    private $callBackFactory;

    /**
     * CallBackRepository constructor.
     *
     * @param ResourceFactory $resourceFactory
     * @param CallBackFactory $callBackFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        ResourceFactory $resourceFactory,
        CallBackFactory $callBackFactory
    ) {
        $this->resourceFactory = $resourceFactory;
        $this->callBackFactory = $callBackFactory;
    }

    /**
     * @param int $id
     * @return CallBackInterface|CallBack
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        /** @var \Bstream\CallMeBack\Model\ResourceModel\CallBack $resource */
        $resource = $this->resourceFactory->create();
        $callBackItem = $this->callBackFactory->create();
        $resource->load($callBackItem, $id);
        if (! $callBackItem->getId()) {
            throw new NoSuchEntityException(__('Unable to find call back request with ID "%1"', $id));
        }
        return $callBackItem;
    }

    /**
     * @param CallBackInterface $callBack
     */
    public function save(CallBackInterface $callBack)
    {
        $this->resourceFactory->create()->save($callBack);
    }

    /**
     * @param CallBackInterface $callBack
     */
    public function delete(CallBackInterface $callBack)
    {
        $this->resourceFactory->create()->delete($callBack);
    }

}

