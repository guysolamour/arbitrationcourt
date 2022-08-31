<?php

namespace App\Models;

use Guysolamour\Administrable\Models\BaseModel;
use Guysolamour\Administrable\Traits\CustomFieldsTrait;
use Guysolamour\Administrable\Traits\ModelTrait;
use Spatie\MediaLibrary\HasMedia;
use Guysolamour\Administrable\Traits\MediaableTrait;
use Guysolamour\Administrable\Traits\DraftableTrait;
use Guysolamour\Administrable\Traits\HasUuid;

class Request extends BaseModel implements HasMedia
{
    use ModelTrait;
    use MediaableTrait;
    use DraftableTrait;
    use HasUuid;
    use CustomFieldsTrait;

    public const PROGRESS_STATUS = 'progress';
    public const ACCEPTED_STATUS = 'accepted';
    public const REJECTED_STATUS = 'rejected';
    public const COMPLETED_STATUS = 'completed';

    public const STATES = [
        'progress', 'accepted', 'rejected', 'completed'
    ];

    // The attributes that are mass assignable.
    public $fillable = ['title', 'uuid', 'content', 'defender', 'amount', 'online', 'applicant_id', 'defender_id', 'defender_email', 'status'];

    // The attributes that should be cast to native types.
    protected $casts = [
        'online' => 'boolean',
        'custom_fields'     => 'json',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $custom_form_fields = [
        ['name' => 'accepted_reason',  'type' => 'text',     'label' => 'Raison'],
        ['name' => 'rejected_reason',  'type' => 'text',     'label' => 'Raison'],
        ['name' => 'selected_referes',  'type' => 'text',     'label' => 'Arbitres'],
    ];


    // add relation methods below

    public function isConfirmed() : bool
    {
        return $this->status == self::ACCEPTED_STATUS;
    }

    public function isRejected() : bool
    {
        return $this->status == self::REJECTED_STATUS;
    }

    public function confirm()
    {
        $this->update(['status' => self::ACCEPTED_STATUS]);
    }
    public function reject()
    {
        $this->update(['status' => self::REJECTED_STATUS]);
    }

    // user relation
    public function applicant()
    {
      return $this->belongsTo(User::class, 'applicant_id');
    }
    // end user relation

    // user relation
    public function defender_user()
    {
      return $this->belongsTo(User::class, 'defender_id');
    }
    // end user relation



      /**
     * @param string $email
     *
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public static function findByUuid($uuid)
    {
        return static::where('uuid', $uuid)->first();
    }


    public function getAttachedFiles()
    {
        return $this->getMedia('attachments');
    }


    public function attachReferes(array $ids)
    {
        $referes = json_encode($ids);

        $this->setCustomField('selected_referes', $referes);

        return $this;

    }

    public function getReferes()
    {
        $ids = json_decode($this->getCustomField('selected_referes',), true);

        return Refere::find($ids);
    }



    public function getMeetingLink()
    {
        return $this->getCustomField('meeting_link') ?? '';
    }


    public function getMeetingDescription()
    {
        return $this->getCustomField('meeting_description') ?? '';
    }

    public function getRejectMotif()
    {
        return $this->getCustomField('rejected_reason') ?? '';
    }
    public function getAcceptMotif()
    {
        return $this->getCustomField('accepted_reason') ?? '';
    }


}
