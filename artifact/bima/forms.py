from django import forms
from .models import QuizResult
# files/forms.py

from django import forms

class UploadFileForm(forms.Form):
    file = forms.FileField()

class UserInfoForm(forms.ModelForm):
    class Meta:
        model = QuizResult
        fields = ['name', 'number']
        widgets = {
            'name': forms.TextInput(attrs={'class': 'form-control'}),
            'number': forms.TextInput(attrs={'class': 'form-control'}),
        }

