<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobPost;
use Illuminate\Http\Request;

class ApplicantXMLController extends Controller
{
    public JobPost $jobPost;
    public function download(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
        $xml = $this->getXMLElement();
        return response($xml->asXML())
            ->header('Content-Type', 'application/xml')
            ->header('Content-Disposition', 'attachment; filename="job-applicant.xml"');
    }

    public function downloadTransformedXML(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;

        $transformedXml = $this->getTransformedXML();

        return response($transformedXml)
            ->header('Content-Type', 'application/xml')
            ->header('Content-Disposition', 'attachment; filename="job-posts.html');
    }

    public function viewXML(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;

        $transformedXml = $this->getTransformedXML();

        return view('management.job-post.export-applicant', ['transformedXml' => $transformedXml]);

    }

    public function getXMLElement(): \SimpleXMLElement
    {

        $applicantXML = new \SimpleXMLElement('<job-applications/>');
        $applicantXML->addAttribute('job-name', $this->jobPost->name);


        foreach ($this->jobPost->users as $user) {
            $root = $applicantXML->addChild('applicant');
            $root->addAttribute('id', $user->id);
            $root->addChild('name', $user->name);
            $root->addChild('email', $user->email);
            $root->addChild('profession', $user->employee->profession);
            $root->addChild('about', $user->employee->about);
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
        $xsl->load(storage_path('xsl/applicant.xsl'));  // Place your XSLT file here

        // Load XML
        $domXml = new \DOMDocument();
        $domXml->loadXML($xml->asXML());

        // Apply XSLT transformation
        $proc = new \XSLTProcessor();
        $proc->importStyleSheet($xsl);

        return $proc->transformToXML($domXml);
    }
}
