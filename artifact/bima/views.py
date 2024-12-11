import ssl
ssl._create_default_https_context = ssl._create_unverified_context
from django.shortcuts import render
from django.http import JsonResponse, HttpResponse
import json

from django.views.decorators.csrf import csrf_exempt
from datetime import datetime, timedelta

from django.http import HttpResponse
from django.conf import settings
import os
from django.shortcuts import render
from django.http import JsonResponse, HttpResponse
from django.http import JsonResponse
import os
from django.conf import settings
from django.http import HttpResponse, HttpResponseNotFound
from django.views.generic import View

import os
from django.conf import settings
from django.http import HttpResponse
from django.views import View
# importing models and libraries
from django.shortcuts import render

from django.views import generic
from django.views.decorators.http import require_GET
from django.http import HttpResponse
# views.py
from django.core.mail import send_mail
from django.http import HttpResponse
from django.shortcuts import render

from django.shortcuts import render, get_object_or_404

from django.http import HttpResponseRedirect
from django.urls import reverse
from django.shortcuts import render, redirect
from django.http import HttpResponse
from django.shortcuts import render

import urllib, base64

from django.http import JsonResponse
import yt_dlp as youtube_dl

def youtube_download_api(request):
    youtube_link = request.GET.get('youtube_link')
    resolution = request.GET.get('resolution', '360p')  # Default 360p
    response_data = {'title': '', 'streams': [], 'error_message': ''}

    if not youtube_link:
        response_data['error_message'] = "YouTube link is required."
        return JsonResponse(response_data)

    try:
        ydl_opts = {
            'noplaylist': True,
            'quiet': True,
        }
        with youtube_dl.YoutubeDL(ydl_opts) as ydl:
            info_dict = ydl.extract_info(youtube_link, download=False)
            response_data['title'] = info_dict.get('title', '')
            formats = info_dict.get('formats', [])
            
            # Filter formats by resolution
            if resolution == 'mp3':
                response_data['streams'] = [{'format': f.get('format_note'), 'url': f.get('url')} for f in formats if f.get('acodec')]
            else:
                try:
                    res_height = int(resolution.replace('p', ''))
                    response_data['streams'] = [{'format': f.get('format'), 'url': f.get('url')} for f in formats if f.get('height') and int(f.get('height')) <= res_height]
                except ValueError:
                    response_data['error_message'] = "Invalid resolution format."
    except youtube_dl.DownloadError as e:
        response_data['error_message'] = f"Error: Video is unavailable ({str(e)})"
    except Exception as e:
        response_data['error_message'] = f"Error: {str(e)}"

    return JsonResponse(response_data)

