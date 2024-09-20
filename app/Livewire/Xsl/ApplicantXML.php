<?php

namespace App\Livewire\Xsl;

use App\Models\JobPost;
use App\Models\User;
use Livewire\Component;

class ApplicantXML extends Component
{
    public JobPost $jobPost;
    public $users;

    public function mount()
    {
        $this->users = $this->jobPost->users;
    }

    public function render()
    {
        return view('livewire.xsl.applicant-x-m-l');
    }

    public function download()
    {
        $xml = $this->getXMLElement();

        return response($xml->asXML())
            ->header('Content-Type', 'application/xml')
            ->header('Content-Disposition', 'attachment; filename="job-applicant.xml"');
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXMLElement(): \SimpleXMLElement
    {
        $applicantXML = new \SimpleXMLElement('<applicants/>');

        foreach ($this->users as $user) {
            $root = $applicantXML->addChild('applicant');
            $root->addAttribute('id', $user->id);
            $root->addChild('name', $user->name);
            $root->addChild('email', $user->email);
        }
        return $applicantXML;
    }

    /**
     * @return false|string|null
     */
    public function getTransformedXML(): string|null|false
    {
        $xml = $this->getXMLElement();

        // Load XSLT stylesheet
        $xsl = new \DOMDocument();
        $xsl->load(storage_path('xsl/job-post-template.xsl'));  // Place your XSLT file here

        // Load XML
        $domXml = new \DOMDocument();
        $domXml->loadXML($xml->asXML());

        // Apply XSLT transformation
        $proc = new \XSLTProcessor();
        $proc->importStyleSheet($xsl);

        return $proc->transformToXML($domXml);
    }
}
