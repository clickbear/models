<?php

namespace Clickbear\Services\Feed;

use Clickbear\Models\Admin\FeedTemplateFileModel;
use Clickbear\Models\Admin\FeedTemplateModel;

class FeedTemplateFileService
{

    /**
     * @var FeedTemplateFileModel
     */
    protected $feedTemplateFile;

    /**
     * Construct the required data
     *
     * FeedTemplateFileService constructor.
     * @param FeedTemplateFileModel $feedTemplateFile
     */
    public function __construct(
        FeedTemplateFileModel $feedTemplateFile
    ) {
        $this->feedTemplateFile = $feedTemplateFile;
    }

    /**
     * Get the latest file of a feed template
     *
     * @param $feedTemplateId
     * @return mixed
     */
    public static function getLatestFile($feedTemplateId) {
        // Find the feed template
        $feedTemplate = FeedTemplateModel::find($feedTemplateId);
        if ($feedTemplate === null) {
            abort(404);
        }

        // Search for the latest file
        $feedTemplateFiles = $feedTemplate->files();
        $latestFile        = $feedTemplateFiles
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->first();

        if ($latestFile === null) {
            abort(404);
        }

        return $latestFile;
    }

}