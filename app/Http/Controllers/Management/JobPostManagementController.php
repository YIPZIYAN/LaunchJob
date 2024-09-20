<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;

class JobPostManagementController extends Controller
{
    public function download()
    {
        $xml = $this->getXMLElement();

        return response($xml->asXML())
            ->header('Content-Type', 'application/xml')
            ->header('Content-Disposition', 'attachment; filename="job-posts.xml"');
    }

    public function downloadTransformedXML()
    {
        $transformedXml = $this->getTransformedXML();

        return response($transformedXml)
            ->header('Content-Type', 'application/xml')
            ->header('Content-Disposition', 'attachment; filename="job-posts.html"');
    }

    public function viewXML()
    {
        $transformedXml = $this->getTransformedXML();

        return view('management.job-post.export', ['transformedXml' => $transformedXml]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.job-post.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        return view('management.job-post.show', [
            'jobPost' => $jobPost->load(['users.employee']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobPost)
    {
        return view('management.job-post.edit', compact('jobPost'));
    }

    /**
     * Archived Job List
     */
    public function archived()
    {
        return view('management.job-post.archived', [
            'jobPosts' => JobPost::onlyTrashed()->get()
        ]);
    }

    public function showApplicant(JobPost $jobPost, User $user)
    {
        $jobApplication = JobApplication::where('job_post_id', $jobPost->id)->where('user_id', $user->id)->first();
        return view('management.job-application.show', [
            'jobApplication' => $jobApplication->load([
                'user.employee',
                'interviews' => function ($query) {
                    $query->orderBy('date');
                }])
        ]);
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXMLElement(): \SimpleXMLElement
    {
        $jobPosts = auth()->user()->company->jobPosts()->get();
        $xml = new \SimpleXMLElement('<jobs/>');

        foreach ($jobPosts as $jobPost) {
            $job = $xml->addChild('job');
            $job->addChild('id', $jobPost->id);
            $job->addChild('name', $jobPost->name);
            $job->addChild('description', $jobPost->description);
            $job->addChild('location', $jobPost->location);
            $job->addChild('min_salary', $jobPost->min_salary);
            $job->addChild('max_salary', $jobPost->max_salary);
            $job->addChild('period', $jobPost->period);
            $job->addChild('mode', $jobPost->mode);
            $job->addChild('type', $jobPost->jobType->name);
        }
        return $xml;
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
