<?php

namespace App\Http\Controllers;

use App\Factory\ProfileFactory;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        return view('profile.edit');
    }

    public function download()
    {
        $xml = $this->getXMLElement();

        return response($xml->asXML())
            ->header('Content-Type', 'application/xml')
            ->header('Content-Disposition', 'attachment; filename="profile.xml"');
    }

    public function downloadTransformedXML()
    {
        $transformedXml = $this->getTransformedXML();

        return response($transformedXml)
            ->header('Content-Type', 'application/xml')
            ->header('Content-Disposition', 'attachment; filename="profile.html"');
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getXMLElement(): \SimpleXMLElement
    {
        //profile details
        $pd = auth()->user();
        $role = ProfileFactory::create(auth()->user());
        $role_data = $role->getProfileDetails();

        $xml = new \SimpleXMLElement('<profile/>');

        $profile = $xml->addChild('details');

        $profile->addChild('id', $pd->id);
        $profile->addChild('name', $pd->name);
        $profile->addChild('email', $pd->email);

        if (auth()->user()->hasRole('employee')) {
            $employee = $profile->addChild('employee'); // Add employee node
            $employee->addChild('profession', $role_data['profession']);
            $employee->addChild('about', $role_data['about']);
        }
        else
        {
            $company = $profile->addChild('company'); // Add company node
            $company->addChild('company_name', $role_data['name']);
            $company->addChild('address', $role_data['address']);
            $company->addChild('description', $role_data['description']);
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
        $xsl->load(storage_path('xsl/profile-template.xsl'));  // Place your XSLT file here

        // Load XML
        $domXml = new \DOMDocument();
        $domXml->loadXML($xml->asXML());

        // Apply XSLT transformation
        $proc = new \XSLTProcessor();
        $proc->importStyleSheet($xsl);

        return $proc->transformToXML($domXml);
    }



}
